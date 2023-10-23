import { Suspense } from "react";
import { fetchData } from "./fetchData";
import "./App.css";

const apiDispositivos = fetchData("http://localhost:8080/api/dispositivos");

function App() {
  const data = apiDispositivos.read();

  return (
    <div className="App">
      <h1>Listado de dispositivos</h1>
      <Suspense fallback={<div>Cargando...</div>}>
        <ul className="card">
          {data?.map((dispositivo) => (
            <li>{dispositivo.nombre}</li>
          ))}
        </ul>
      </Suspense>
    </div>
  );
}

export default App;
