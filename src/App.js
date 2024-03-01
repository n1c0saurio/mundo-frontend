import { Suspense, useState } from "react";
import { fetchData } from "./utils/fetchAPI";
import "./styles/App.css";
import Table from "./components/Table";
import Filters from "./components/Filters";

const apiBodegas = fetchData("http://localhost:8080/api/bodegas");
const apiMarcas = fetchData("http://localhost:8080/api/marcas");
const apiModelos = fetchData(`http://localhost:8080/api/modelos`);
const apiDispositivos = fetchData("http://localhost:8080/api/dispositivos");

function App() {
  const bodegas = apiBodegas.read();
  const marcas = apiMarcas.read();
  const modelos = apiModelos.read();
  const dispositivos = apiDispositivos.read();

  const [filtroBodega, setFiltroBodega] = useState("");
  const [filtroMarca, setFiltroMarca] = useState("");
  const [filtroModelo, setFiltroModelo] = useState("");
  const [marcaDeModelo, setMarcaDeModelo] = useState("");

  function filtroDispositivos(dispositivo) {
    if (filtroBodega && dispositivo.bodega !== filtroBodega) return false;
    if (filtroMarca && dispositivo.marca !== filtroMarca) return false;
    if (filtroModelo && dispositivo.modelo !== filtroModelo) return false;
    return true;
  }

  return (
    <div className="App">
      <h1>Listado de dispositivos</h1>
      <Suspense fallback={<div>Cargando...</div>}>
        <Filters
          warehouses={bodegas}
          brands={marcas}
          models={modelos}
          setWarehouseFilter={setFiltroBodega}
          setBrandFilter={setFiltroMarca}
          setModelFilter={setFiltroModelo}
          brandFilter={filtroMarca}
          marcaDeModelo={marcaDeModelo}
          setMarcaDeModelo={setMarcaDeModelo}
        />
        <Table devices={dispositivos} deviceFilter={filtroDispositivos} />
      </Suspense>
    </div>
  );
}

export default App;
