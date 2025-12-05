export default function SearchInput({ value, onChange }) {
  return (
    <div className="search-input">
      <input
        type="text"
        placeholder="Search tasks..."
        value={value}
        onChange={(e) => onChange(e.target.value)}
      />
    </div>
  );
}