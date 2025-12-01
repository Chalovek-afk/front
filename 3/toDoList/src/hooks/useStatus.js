import { useState } from 'react';

export const useStatus = () => {
  const [message, setMessage] = useState('');
  const [visible, setVisible] = useState(false);
  const [fading, setFading] = useState(false); // для анимации

  const show = (msg, duration = 4000) => {
    // Если уже показывается — сбрасываем анимацию
    if (visible) {
      setFading(true);
      setTimeout(() => {
        setMessage(msg);
        setFading(false);
        setVisible(true);
      }, 300); // совпадает с transition
    } else {
      setMessage(msg);
      setVisible(true);
      setFading(false);
    }

    // Авто-скрытие через `duration`
    const timer = setTimeout(() => {
      setFading(true);
      setTimeout(() => {
        setVisible(false);
        setFading(false);
      }, 300); // совпадает с transition
    }, duration);

    return () => clearTimeout(timer);
  };

  return { message, visible, fading, show };
};