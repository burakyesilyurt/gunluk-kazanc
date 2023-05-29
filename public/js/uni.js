const uniSelect = document.getElementById("uniSelect");
async function getJSONData() {
  const response = await fetch("https://raw.githubusercontent.com/anilozmen/TR-iller-universiteler-JSON/master/province-universities.json");
  const jsonData = await response.json();
  return jsonData;
}


const displayOption = async () => {
  const unies = await getJSONData();
  for (uni of unies) {
    for (nameOfTheUni of uni.universities) {
      const newOption = document.createElement("option");
      newOption.value = nameOfTheUni.name;
      newOption.text = nameOfTheUni.name;
      uniSelect.appendChild(newOption);
    }
  }
};
displayOption();

