import { fetchData } from "./api.js";

async function main() {
  try {
    const data = await fetchData();
    console.log("Data:", data);
    // render data
  } catch (error) {
    console.error("Error in main:", error);
  }
}
main();
