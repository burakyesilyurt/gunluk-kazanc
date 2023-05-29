const ilSelect = document.getElementById("il");
async function getJSONData() {
  const response = await fetch(
    "https://gist.githubusercontent.com/burakyesilyurt/9e6779acc65cda45f8a8fa9f26b3ab3d/raw/464c8463134c7d4405edca8704bc7c55e9a98e07/%25C4%25B0ller.json"
  );
  const jsonData = await response.json();
  return jsonData;
}
const displayIl = async () => {
  const iller = await getJSONData();
  for (il in iller) {
    const newOption = document.createElement("option");
    newOption.value = iller[il];
    newOption.text = iller[il];
    ilSelect.appendChild(newOption);
  }
};
displayIl();