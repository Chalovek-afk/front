export default function StatusMessage({ message, visible, fading }) {
  return (
    <div
      id="information"
      className={
        visible
          ? fading
            ? 'fading'
            : 'visible'
          : ''
      }
    >
      {message}
    </div>
  );
}