import { memo } from 'react';

function Pagination({ currentPage, totalPages, onChangePage }) {
  const handlePrev = () => {
    if (currentPage > 0) onChangePage(currentPage - 1);
  };

  const handleNext = () => {
    if (currentPage < totalPages - 1) onChangePage(currentPage + 1);
  };

  const pageButtons = [];
  for (let i = 0; i < totalPages; i++) {
    pageButtons.push(
      <button
        key={i}
        data-id={i}
        className={currentPage === i ? 'current' : ''}
        onClick={() => onChangePage(i)}
        aria-label={`Page ${i + 1}`}
      >
        {i + 1}
      </button>
    );
  }

  return (
    <div id="pagination-container">
      <button
        onClick={handlePrev}
        disabled={currentPage === 0}
        aria-label="Previous page"
        style={{ opacity: currentPage === 0 ? 0.5 : 1 }}
      >
        ← Prev
      </button>
      
      <div id="pagination-button-container">
        {pageButtons}
      </div>

      <button
        onClick={handleNext}
        disabled={currentPage >= totalPages - 1}
        aria-label="Next page"
        style={{ opacity: currentPage >= totalPages - 1 ? 0.5 : 1 }}
      >
        Next →
      </button>
    </div>
  );
}

export default memo(Pagination, (prev, next) =>
  prev.currentPage === next.currentPage &&
  prev.totalPages === next.totalPages
);