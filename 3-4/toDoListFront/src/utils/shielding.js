// src/utils/shielding.js

export const backwardSymbolShielding = (str) => {
  if (typeof str !== 'string') return str;
  return str
    .replace(/&quot;/g, '"')
    .replace(/&apos;/g, "'")
    .replace(/&grave;/g, '`')
    .replace(/&colon;/g, ':')
    .replace(/&percnt;/g, '%')
    .replace(/&quest;/g, '?')
    .replace(/&ast;/g, '*')
    .replace(/&num;/g, '#')
    .replace(/&lt;/g, '<')
    .replace(/&gt;/g, '>')
    .replace(/&amp;/g, '&');
};

export const editSymbolShielding = (str) => {
  if (typeof str !== 'string') return str;
  return str
    .replace(/ +/g, ' ')
    .replace(/</g, '&lt;')
    .replace(/>/g, '&gt;')
    .replace(/"/g, '&quot;')
    .replace(/'/g, '&apos;')
    .replace(/`/g, '&grave;')
    .replace(/:/g, '&colon;')
    .replace(/%/g, '&percnt;')
    .replace(/\?/g, '&quest;')
    .replace(/\*/g, '&ast;')
    .replace(/#/g, '&num;');
};

export const addSymbolShielding = (str) => {
  if (typeof str !== 'string') return str;
  return editSymbolShielding(str.replace(/&/g, '&amp;'));
};