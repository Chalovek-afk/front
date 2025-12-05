from typing import Optional
from pydantic import BaseModel

class TaskBase(BaseModel):
    text: str
    checked: bool

class TaskUpdate(BaseModel):
    text: Optional[str] = None
    checked: Optional[bool]  = None

class TaskCreate(BaseModel):
    text: str

class Task(TaskBase):
    id: int