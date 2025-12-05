// hooks/useTasks.ts
import { useState, useEffect, useCallback } from "react";
import {
  getTasks,
  createTask,
  updateTask,
  deleteTask,
  updateAllTasks,
  deleteCompletedTasks,
} from "../api/tasks";
import {
  addSymbolShielding,
  backwardSymbolShielding,
} from "../utils/shielding";

export type Task = {
  id: number;
  text: string;
  checked: boolean;
};

export const useTasks = () => {
  const [tasks, setTasks] = useState<Task[]>([]);

  useEffect(() => {
    getTasks()
      .then((data) => {
        const shielded = data.map((t) => ({
          ...t,
          text: addSymbolShielding(t.text),
        }));
        setTasks(shielded);
      })
      .catch((err) => console.error("Failed to load tasks:", err));
  }, []);

  const addTask = useCallback((text: string) => {
    const cleanText = backwardSymbolShielding(text.trim());
    if (!cleanText) return Promise.reject(new Error("Text is empty"));

    return createTask({ text: cleanText })
      .then((newTask) => {
        const shieldedTask = {
          ...newTask,
          text: addSymbolShielding(newTask.text),
        };
        setTasks((prev) => [...prev, shieldedTask]);
        return { success: true };
      })
      .catch((err) => ({ success: false, error: err.message }));
  }, []);

  const toggleTask = useCallback(
    (id: number) => {
      const task = tasks.find((t) => t.id === id);
      if (!task) return;

      updateTask(id, { checked: !task.checked }).then((updated) => {
        setTasks((prev) =>
          prev.map((t) =>
            t.id === id ? { ...t, checked: updated.checked } : t
          )
        );
      });
    },
    [tasks]
  );

  const toggleAll = useCallback(() => {
    const newChecked = tasks.length > 0 && !tasks.every((t) => t.checked);
    updateAllTasks({ checked: newChecked }).then(() => {
      setTasks((prev) => prev.map((t) => ({ ...t, checked: newChecked })));
    });
  }, [tasks]);

  const deleteTaskById = useCallback((id: number) => {
    deleteTask(id).then(() => {
      setTasks((prev) => prev.filter((t) => t.id !== id));
    });
  }, []);

  const deleteCompleted = useCallback(() => {
    return deleteCompletedTasks().then((data) => {
      setTasks((prev) => prev.filter((t) => !t.checked));
      return data.message;
    });
  }, []);

  const updateTaskText = useCallback((id: number, newText: string) => {
    const cleanText = backwardSymbolShielding(newText.trim());
    if (!cleanText) return;

    updateTask(id, { text: cleanText }).then((updated) => {
      setTasks((prev) =>
        prev.map((t) =>
          t.id === id ? { ...t, text: addSymbolShielding(updated.text) } : t
        )
      );
    });
  }, []);

  return {
    tasks,
    setTasks,
    addTask,
    toggleTask,
    toggleAll,
    deleteTask: deleteTaskById,
    deleteCompleted,
    updateTaskText,
  };
};
