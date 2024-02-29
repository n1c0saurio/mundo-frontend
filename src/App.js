import { Suspense, useState } from "react";
import { fetchData } from "./utils/fetchAPI";
import "./styles/App.css";
import Table from "./components/Table";

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
        <div id="selectWrapper">
          <select
            name="bodega"
            onChange={(e) => setFiltroBodega(e.target.value)}
          >
            <option value=""></option>
            {bodegas?.map((bodega) => (
              <option value={bodega.nombre}>{bodega.nombre}</option>
            ))}
          </select>

          <select
            name="marca"
            onChange={(e) => {
              if (e.target.value) {
                const marca = JSON.parse(e.target.value);
                setFiltroMarca(marca.nombre);
                setMarcaDeModelo(marca.id);
              } else {
                setFiltroMarca("");
                setFiltroModelo("");
                setMarcaDeModelo("");
              }
            }}
          >
            <option value=""></option>
            {marcas?.map((marca) => (
              <option value={JSON.stringify(marca)}>{marca.nombre}</option>
            ))}
          </select>

          <select
            name="modelo"
            onChange={(e) => setFiltroModelo(e.target.value)}
          >
            <option value="">
              {filtroMarca ? "" : "Seleccione una marca primero"}
            </option>
            ;
            {modelos
              ?.filter((modelo) => modelo.marca_id == marcaDeModelo)
              .map((modelo) => (
                <option value={modelo.nombre}>{modelo.nombre}</option>
              ))}
          </select>
        </div>

        <Table devices={dispositivos} deviceFilter={filtroDispositivos} />
      </Suspense>
    </div>
  );
}

export default App;
