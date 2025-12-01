// src/hooks/useFilter.js
import { useState, useMemo } from 'react';

export const useFilter = (tasks) => {
  const [tabType, setTabType] = useState(0);
  const [searchQuery, setSearchQuery] = useState('');

  const filteredTasks = useMemo(() => {
    let result = tasks;

    switch (tabType) {
      case 1: result = result.filter(t => !t.checked); break;
      case 2: result = result.filter(t => t.checked); break;
      default: break;
    }

    if (searchQuery.trim()) {
      const q = searchQuery.toLowerCase();
      result = result.filter(task =>
        task.text.toLowerCase().includes(q)
      );
    }

    return result;
  }, [tasks, tabType, searchQuery]);

  const activeCount = useMemo(
    () => tasks.filter(t => !t.checked && 
      (searchQuery.trim() === '' || t.text.toLowerCase().includes(searchQuery.toLowerCase()))
    ).length,
    [tasks, searchQuery]
  );

  return {
    tabType,
    setTabType,
    searchQuery,
    setSearchQuery,
    filteredTasks,
    activeCount,
  };
};