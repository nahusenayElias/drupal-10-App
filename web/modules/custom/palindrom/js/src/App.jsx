import React, { useState } from 'react';

const App = () => {
  const [input, setInput] = useState('');
  const [result, setResult] = useState(null);

  const isPalindrome = (str) => {
    const cleaned = str.replace(/[^A-Za-z0-9]/g, '').toLowerCase();
    return cleaned === cleaned.split('').reverse().join('');
  };

  const handleCheck = () => {
    if (input) {
      setResult(isPalindrome(input));
    } else {
      setResult(null);
    }
  };

  return (
    <div style={{ textAlign: 'center', marginTop: '50px' }}>
      <h1>Palindrome Checker module</h1>
      <input
        type="text"
        placeholder="Enter text"
        value={input}
        onChange={(e) => setInput(e.target.value)}
        style={{ padding: '10px', fontSize: '16px', width: '300px' }}
      />
      <br /><br />
      <button
        onClick={handleCheck}
        style={{ padding: '10px 20px', fontSize: '16px' }}
      >
        Check
      </button>
      <br /><br />
      {result !== null && (
        <h2>
          {result
            ? `"${input}" is a palindrome!`
            : `"${input}" is not a palindrome.`}
        </h2>
      )}
    </div>
  );
};

export default App;
