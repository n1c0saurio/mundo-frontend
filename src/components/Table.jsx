import "../styles/Table.css";

function Table({ devices, deviceFilter }) {
  return (
    <table>
      <thead>
        <tr>
          <th className="table__id">ID</th>
          <th className="table__warehouse">Bodega</th>
          <th className="table__brand">Marca</th>
          <th className="table__model">Modelo</th>
          <th className="table__name">Nombre</th>
        </tr>
      </thead>
      <tbody>
        {devices
          ?.filter((dispositivo) => deviceFilter(dispositivo))
          .map((device) => (
            <tr key={device.id}>
              <td className="table__id">{device.id}</td>
              <td className="table__warehouse">{device.bodega}</td>
              <td className="table__brand">{device.marca}</td>
              <td className="table__model">{device.modelo}</td>
              <td className="table__name">{device.nombre}</td>
            </tr>
          ))}
      </tbody>
    </table>
  );
}

export default Table;
