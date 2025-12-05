export default function CheckAll({ checked, disabled, onToggle }) {
  return (
    <div className="check">
      <input
        type="checkbox"
        name="check-all"
        id="check-all"
        checked={checked}
        onChange={onToggle}
        disabled={disabled}
      />
      <label htmlFor="check-all">Check all todos</label>
    </div>
  );
}