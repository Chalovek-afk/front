import { useRef, useLayoutEffect } from 'react';
import { backwardSymbolShielding } from '../utils/shielding';


export default function TaskItem({
  task,
  isEditing,
  editText,
  onToggle,
  onDelete,
  onStartEdit,
  onEditInput,
  onSaveEdit,
  onCancelEdit,
}) {
  const editTextareaRef = useRef(null);

  // Растягиваем поле редактирования (как и у TaskInput)
  useLayoutEffect(() => {
    if (isEditing && editTextareaRef.current) {
      const el = editTextareaRef.current;
      el.style.height = 'auto';
      const newHeight = Math.max(20, el.scrollHeight);
      el.style.height = `${newHeight}px`;
    }
  }, [isEditing, editText]);

  const handleDoubleClick = () => {
    if (!isEditing) {
      onStartEdit(task);
    }
  };

  const handleEditBlurOrKey = (e) => {
    if (e.type === 'blur' || e.key === 'Enter') {
      if (e.key === 'Enter') e.preventDefault();
      onSaveEdit(task.id, editText);
    } else if (e.key === 'Escape') {
      onCancelEdit();
    }
  };

  const handleEditInput = (e) => {
    onEditInput(e.target.value);
  };

  return (
    <li
      data-id={task.id}
      className={task.checked ? 'completed' : ''}
    >
      <div>
        <input
          type="checkbox"
          tabIndex="-1"
          checked={task.checked}
          onChange={() => onToggle(task.id)}
        />
      </div>

      {isEditing ? (
        <>
          <textarea
            ref={editTextareaRef}
            value={editText}
            onChange={handleEditInput}
            onBlur={handleEditBlurOrKey}
            onKeyDown={handleEditBlurOrKey}
            autoFocus
            maxLength={255}
            style={{
              resize: 'none',
              overflow: 'hidden',
              minHeight: '20px',
              width: '80%',
            }}
          />
          <label className="hidden">{task.text}</label>
        </>
      ) : (
        <>
          <textarea className="hidden" />
          <label onDoubleClick={handleDoubleClick}>
            {backwardSymbolShielding(task.text)}
          </label>
        </>
      )}

      <button
        type="button"
        tabIndex="-1"
        onClick={() => onDelete(task.id)}
      >
        X
      </button>
    </li>
  );
}