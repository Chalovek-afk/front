import { useState, useMemo } from 'react';

const TASKS_PER_PAGE = 5;

export const usePagination = (items) => {
  const [currentPage, setCurrentPage] = useState(0);

  const totalPages = useMemo(() => {
    return Math.ceil(items.length / TASKS_PER_PAGE);
  }, [items.length]);

  const paginatedItems = useMemo(() => {
    const start = currentPage * TASKS_PER_PAGE;
    return items.slice(start, start + TASKS_PER_PAGE);
  }, [items, currentPage]);

  const setPage = (page) => {
    if (page >= 0 && page < totalPages) {
      setCurrentPage(page);
    }
  };

  const resetPage = () => setCurrentPage(0);

  return {
    currentPage,
    totalPages,
    paginatedItems,
    setPage,
    resetPage,
  };
};