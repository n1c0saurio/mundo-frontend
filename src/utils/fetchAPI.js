/**
 *
 * @param {Promise} promise - A promise returned from `fetch`
 * @returns {object} Data fetched or an error, depending on promise status
 */
function getSuspender(promise) {
  let status = "pending";
  let response;

  const suspender = promise.then(
    (res) => {
      status = "success";
      response = res;
    },
    (err) => {
      status = "error";
      response = err;
    }
  );

  const read = () => {
    switch (status) {
      case "pending":
        throw suspender;
      case "error":
        throw response;
      default:
        return response;
    }
  };

  return { read };
}

/**
 * Fetch data from an API endpoint.
 *
 * @param {string} url - The url where to fetch data
 * @returns {object} Data fetched
 */
export function fetchData(url) {
  const promise = fetch(url)
    .then((response) => response.json())
    .then((data) => data)
    .catch((error) => {
      console.log(error);
    });

  return getSuspender(promise);
}
