export default function FilterTabs({
  tabType,
  total,
  active,
  completed,
  onChangeTab,
}) {
  return (
    <div id="task-counter">
      <button
        id="0"
        className={tabType === 0 ? 'current' : ''}
        onClick={() => onChangeTab(0)}
      >
        All ({total})
      </button>
      <button
        id="1"
        className={tabType === 1 ? 'current' : ''}
        onClick={() => onChangeTab(1)}
      >
        Active ({active})
      </button>
      <button
        id="2"
        className={tabType === 2 ? 'current' : ''}
        onClick={() => onChangeTab(2)}
      >
        Completed ({completed})
      </button>
    </div>
  );
}