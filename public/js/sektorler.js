const sektorlerBox = document.getElementById("sektor");
async function getJSONData() {
  const response = await fetch(
    "https://gist.githubusercontent.com/burakyesilyurt/a2213941eb72eeef157c4f1db2e7587d/raw/4c004254e0a26178d9d9db0b19e6dc37fc26554d/sektorler.json"
  );
  const jsonData = await response.json();
  return jsonData;
}

const displaySektor = async () => {
  const sektorler = await getJSONData();
  for (sektor in sektorler) {
    const newOption = document.createElement("option");
    newOption.value = sektorler[sektor];
    newOption.text = sektorler[sektor];
    sektorlerBox.appendChild(newOption);
  }
};
displaySektor();