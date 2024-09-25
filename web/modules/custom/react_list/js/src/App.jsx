import { useEffect, useState } from 'react'

export default function App() {
  const [nodes, setNodes] = useState([]);
  console.log("App loading...");

  useEffect(() => {
    fetch("/jsonapi/node/article")
      .then(response => response.json())
      .then(data => setNodes(data.data));
  }, []);

  return (
    <div>
      <h2>Articles list</h2>
      <ul style={{ listStyleType: 'none', padding: 0 }}>
        {nodes.map(node => (
          <li
            key={node.id}
            style={{
              border: '1px solid #ccc',
              borderRadius: '5px',
              padding: '10px',
              marginBottom: '10px',
            }}
          >
            <div>Title: {node.attributes.title}</div>
            <div>
              Created: {new Date(node.attributes.created).toLocaleString()}
            </div>
            <div>Body: {node.attributes.body.value.slice(0, 250)}...</div>
          </li>
        ))}
      </ul>
    </div>
  );
}