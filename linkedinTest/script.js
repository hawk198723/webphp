document
  .getElementById("statusForm")
  .addEventListener("submit", function (event) {
    event.preventDefault();
    var statusText = document.getElementById("status").value;
    updateLinkedInStatus(statusText);
  });

function updateLinkedInStatus(statusText) {
  const apiUrl = "https://www.jasonxw.com/linkedinTest/proxy.php";
  const accessToken =
    "AQVwneP5aLcpZ5pk7ggm-47DJP0zp78tWfPyzv1Hz_yk8ip1qdtWhQw3B4KbqY3cB_QcDUfXDfiUMf_WwTrnNDZY1CQ8LczIxVweeUINl1ByWXKvHz5_cbg_j8RUJyxtx00pjBYzVPhG6LyEItpoJWqSbKGG8aPPaqfy29YsGRWjmGOumgMeriPsVxUvgYT64bZjCI7r0dy_yTjx3MWkXbK7IlsSJYPwKQ7zwEzJTmmMYbmTuONJpFcr0SYkg9s_wNpEG5M7RJr9LdWzinISp1GQ7G2n1wBYzuy7Nl_57BLIoOTTBvY1fhV6x5NvaIx_ETf6ftVJAjVgPaMb0GuXhS82fKfsFw";

  const postData = {
    author: "urn:li:person:100898454",
    lifecycleState: "PUBLISHED",
    specificContent: {
      "com.linkedin.ugc.ShareContent": {
        shareCommentary: {
          text: statusText,
        },
        shareMediaCategory: "NONE",
      },
    },
    visibility: {
      "com.linkedin.ugc.MemberNetworkVisibility": "CONNECTIONS",
    },
  };

  fetch(apiUrl, {
    method: "POST",
    headers: {
      Authorization: `Bearer ${accessToken}`,
      "Content-Type": "application/json",
      "X-Restli-Protocol-Version": "2.0.0",
    },
    body: JSON.stringify(postData),
  })
    .then((response) => {
      if (response.ok) {
        alert("Success！");
      } else {
        alert("Fail");
      }
    })
    .catch((error) => {
      console.error("Fail when update LinkedIn Status:", error);
      alert("Fail");
    });
}
