import { useRef, useLayoutEffect } from 'react';

export default function TaskInput({ value, onChange, onAdd, onKeyDown }) {
  const textareaRef = useRef(null);

  useLayoutEffect(() => {
    const el = textareaRef.current;
    if (el) {
      el.style.height = '10';
      const newHeight = Math.max(20, el.scrollHeight);
      el.style.height = `${newHeight}px`;
    }
  }, [value]);

  const handleKeyDown = (e) => {
    if (onKeyDown) onKeyDown(e);
    if (e.key === 'Enter' && !e.shiftKey && !e.ctrlKey) {
      e.preventDefault();
      onAdd();
    }
  };

  return (
    <div className="flex-block">
      <textarea
        id="task-add"
        ref={textareaRef}
        value={value}
        onChange={onChange}
        onKeyDown={handleKeyDown}
        maxLength={255}
      />
      <button id="add-button" type="button" onClick={onAdd}>
        Add
      </button>
    </div>
  );
}