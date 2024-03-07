import "../styles/Filters.scss";

function Filters({
  warehouses,
  brands,
  models,
  setWarehouseFilter,
  setBrandFilter,
  setModelFilter,
  brandFilter, // TODO: check
  marcaDeModelo, // TODO: check
  setMarcaDeModelo, // TODO: check
}) {
  return (
    <div id="filters">
      <select
        name="warehouse"
        onChange={(e) => setWarehouseFilter(e.target.value)}
      >
        <option value=""></option>
        {warehouses?.map((warehouse) => (
          <option value={warehouse.nombre}>{warehouse.nombre}</option>
        ))}
      </select>

      <select
        name="marca"
        onChange={(e) => {
          if (e.target.value) {
            const marca = JSON.parse(e.target.value);
            setBrandFilter(marca.nombre);
            setMarcaDeModelo(marca.id);
          } else {
            setBrandFilter("");
            setModelFilter("");
            setMarcaDeModelo("");
          }
        }}
      >
        <option value=""></option>
        {brands?.map((brand) => (
          <option value={JSON.stringify(brand)}>{brand.nombre}</option>
        ))}
      </select>

      <select name="modelo" onChange={(e) => setModelFilter(e.target.value)}>
        <option value="">
          {brandFilter ? "" : "Seleccione una marca primero"}
        </option>
        ;
        {models
          ?.filter((model) => model.marca_id == marcaDeModelo)
          .map((model) => (
            <option value={model.nombre}>{model.nombre}</option>
          ))}
      </select>
    </div>
  );
}

export default Filters;
