import { useState } from 'react';
import { addSymbolShielding } from '../utils/shielding';


export const useTasks = () => {
  const [tasks, setTasks] = useState([]);

  const addTask = (text) => {
    const trimmed = text.trim();

    if (trimmed.length === 0) {
      return { success: false, error: 'Task cannot be empty' };
    }

    if (trimmed.length > 255) {
      return { success: false, error: 'Task text is too big!' };
    }

    const shielded = addSymbolShielding(trimmed);
    const newTask = {
      id: Date.now(),
      text: shielded,
      checked: false,
    };
    setTasks(prev => [...prev, newTask]);
    return { success: true };
  };

  const toggleTask = (id) => {
    setTasks(prev =>
      prev.map(task => task.id === id ? { ...task, checked: !task.checked } : task)
    );
  };

  const deleteTask = (id) => {
    setTasks(prev => prev.filter(task => task.id !== id));
  };

  const toggleAll = () => {
    const allChecked = tasks.length > 0 && tasks.every(t => t.checked);
    const newChecked = !allChecked;
    setTasks(prev => prev.map(task => ({ ...task, checked: newChecked })));
  };

  const deleteCompleted = () => {
    const count = tasks.filter(t => t.checked).length;
    setTasks(prev => prev.filter(t => !t.checked));
    return count;
  };

  return {
    tasks,
    addTask,
    setTasks,
    toggleTask,
    deleteTask,
    toggleAll,
    deleteCompleted,
  };
};