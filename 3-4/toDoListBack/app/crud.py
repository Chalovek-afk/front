from sqlalchemy.orm import Session
from . import models, schemas  

def get_task(db: Session, task_id: int):
    return db.query(models.Task).filter(models.Task.id == task_id).first()

def get_tasks(db: Session):
    return db.query(models.Task).all()

def create_task(db: Session, task: schemas.TaskBase):
    db_task = models.Task(text=task.text, checked=False)
    db.add(db_task)
    db.commit()
    db.refresh(db_task)
    return db_task

def delete_task(db: Session, task_id: int):
    db_task = get_task(db, task_id)
    if db_task:
        db.delete(db_task)
        db.commit()
        return db_task
    return None

def update_task(db: Session, task_id: int, task: schemas.TaskUpdate):
    db_task = get_task(db, task_id)
    data_to_update = task.model_dump(exclude_unset=True)
    if db_task:
        for key, value in data_to_update.items():
            setattr(db_task, key, value)
        db.commit()
        return db_task
    return None


def update_all(db: Session, task: schemas.TaskUpdate):
    result = db.query(models.Task).update(task.model_dump(exclude_unset=True))
    db.commit()
    return result

def delete_all(db: Session):
    result = db.query(models.Task).filter(models.Task.checked == True).delete()
    db.commit()
    return result 