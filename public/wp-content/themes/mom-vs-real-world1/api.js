export async function fetchData() {
  try {
    const response = await fetch(
      "https://mom-vs-real-world1.local/wp-json/wp/v2/posts"
    );
    if (!response.ok) {
      throw new Error("Failed to fetch data");
    }
    const data = await response.json();
    return data;
  } catch (error) {
    console.error("Error fetching data:", error);
    return null;
  }
}
jQuery(document).ready(function ($) {
  $.ajax({
    url: wp_data.ajax_url,
    type: "post",
    data: {
      action: "get_latest_post",
    },
    success: function (response) {
      $(".breadcrumbs_section").after(
        '<div class="latest-post">' + response + "</div>"
      );
    },
  });
});
