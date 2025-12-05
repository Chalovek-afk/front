import globals from 'globals';
import pluginJs from '@eslint/js';
import pluginReact from 'eslint-plugin-react';

export default [
  { files: ['**/*.{js,mjs,cjs,jsx}'] },
  { files: ['**/*.js'], languageOptions: { sourceType: 'commonjs' } },
  {
    rules: {
      quotes: ['error', 'single'], 
      indent: ['error', 2],
      'max-len': ['error', {
        code: 100,
        ignoreComments: true,
      }],
    },
    languageOptions: { globals: globals.browser },
  },
  pluginJs.configs.recommended,
  pluginReact.configs.flat.recommended,
];
