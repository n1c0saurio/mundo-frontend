import { Suspense, useState } from "react";
import { fetchData } from "./fetchData";
import "./App.css";

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
    let match = true;
    if (filtroBodega) {
      match = dispositivo.bodega !== filtroBodega ? false : match;
    }
    if (filtroMarca) {
      match = dispositivo.marca !== filtroMarca ? false : match;
    }
    if (filtroModelo) {
      match = dispositivo.modelo !== filtroModelo ? false : match;
    }
    return match;
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

        <table>
          <thead>
            <tr>
              <th className="table-id">ID</th>
              <th className="table-nombre">Nombre</th>
              <th className="table-marca">Marca</th>
              <th className="table-modelo">Modelo</th>
              <th className="table-bodega">Bodega</th>
            </tr>
          </thead>
          <tbody>
            {dispositivos
              ?.filter((dispositivo) => filtroDispositivos(dispositivo))
              .map((dispositivo) => (
                <tr key={dispositivo.id}>
                  <td className="table-id">{dispositivo.id}</td>
                  <td className="table-nombre">{dispositivo.nombre}</td>
                  <td className="table-marca">{dispositivo.marca}</td>
                  <td className="table-modelo">{dispositivo.modelo}</td>
                  <td className="table-bodega">{dispositivo.bodega}</td>
                </tr>
              ))}
          </tbody>
        </table>
      </Suspense>
    </div>
  );
}

export default App;
