import { useState, useCallback } from 'react';
import { useTasks } from '../hooks/useTasks';
import { useFilter } from '../hooks/useFilter';
import { usePagination } from '../hooks/usePagination';
import { useStatus } from '../hooks/useStatus';
import { addSymbolShielding } from '../utils/shielding';


import TaskInput from './TaskInput';
import CheckAll from './CheckAll';
import TaskItem from './TaskItem';
import FilterTabs from './FilterTabs';
import Pagination from './Pagination';
import DeleteCompleted from './DeleteCompleted';
import StatusMessage from './StatusMessage';
import SearchInput from './SearchInput';

export default function ToDoApp() {
  const tasksCtx = useTasks();
  const filterCtx = useFilter(tasksCtx.tasks);
  const paginationCtx = usePagination(filterCtx.filteredTasks);
  const statusCtx = useStatus();

  const [inputValue, setInputValue] = useState('');
  const [editingId, setEditingId] = useState(null);
  const [editText, setEditText] = useState('');

  const handleAdd = () => {
    const result = tasksCtx.addTask(inputValue);
    if (result.success) {
      setInputValue('');
      statusCtx.show('Task created!');
    } else {
      statusCtx.show(result.error);
    }
  };

  const handleToggle = (id) => {
    tasksCtx.toggleTask(id);
    statusCtx.show('Task updated!');
  };

  const handleDelete = (id) => {
    tasksCtx.deleteTask(id);
    statusCtx.show('Task deleted!');
  };

  const handleStartEdit = useCallback((task) => {
    setEditingId(task.id);
    setEditText(task.text);
  }, []);

  const handleSaveEdit =(id, text) => {
    if (text.trim()) {
      const shielded = addSymbolShielding(text.trim());
      const updatedTasks = tasksCtx.tasks.map(t =>
        t.id === id ? { ...t, text: shielded } : t
      );
      tasksCtx.setTasks(updatedTasks);
      statusCtx.show('Task updated!');
    }
    setEditingId(null);
  };

  const handleCancelEdit = useCallback(() => {
    setEditingId(null);
  }, []);

  const handleChangeTab = (type) => {
    filterCtx.setTabType(type);
    paginationCtx.resetPage();
  };

  const handleDeleteCompleted =() => {
    const count = tasksCtx.deleteCompleted();
    statusCtx.show(
      count > 0
        ? `${count} completed task(s) deleted!`
        : 'No completed tasks to delete'
    );
  };

  const completedCount = tasksCtx.tasks.length - filterCtx.activeCount;

  return (
    <>
      <div className="inputs">
        <TaskInput
          value={inputValue}
          onChange={(e) => setInputValue(e.target.value)}
          onAdd={handleAdd}
        />
        <CheckAll
          checked={tasksCtx.tasks.length > 0 && tasksCtx.tasks.every(t => t.checked)}
          disabled={tasksCtx.tasks.length === 0}
          onToggle={tasksCtx.toggleAll}
        />
        <SearchInput
        value={filterCtx.searchQuery}
        onChange={filterCtx.setSearchQuery}
        />
      </div>

      <StatusMessage
        message={statusCtx.message}
        visible={statusCtx.visible}
        fading={statusCtx.fading}
      />

      <ul id="to-do-list">
        {paginationCtx.paginatedItems.map(task => (
          <TaskItem
            key={task.id}
            task={task}
            isEditing={editingId === task.id}
            editText={editText}
            onToggle={handleToggle}
            onDelete={handleDelete}
            onStartEdit={handleStartEdit}
            onEditInput={setEditText}
            onSaveEdit={handleSaveEdit}
            onCancelEdit={handleCancelEdit}
          />
        ))}
      </ul>

      <FilterTabs
        tabType={filterCtx.tabType}
        total={tasksCtx.tasks.length}
        active={filterCtx.activeCount}
        completed={completedCount}
        onChangeTab={handleChangeTab}
      />

      <Pagination
        currentPage={paginationCtx.currentPage}
        totalPages={paginationCtx.totalPages}
        onChangePage={(page) => paginationCtx.setPage(page)}
      />

      <DeleteCompleted onClick={handleDeleteCompleted} />
    </>
  );
}