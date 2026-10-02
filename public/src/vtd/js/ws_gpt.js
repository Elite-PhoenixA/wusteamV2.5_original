function WusTeamGPT(usePjax) {
  var WusTeamGPTIsRunning = false;

  function insertAIDiv(selector) {
    removeExistingAIDiv();

    const targetElement = document.querySelector(selector);

    if (!targetElement) {
      return;
    }

    const aiDiv = document.createElement('div');
    aiDiv.className = 'post-WusTeamGPT';

    const aiTitleDiv = document.createElement('div');
    aiTitleDiv.className = 'WusTeamGPT-title';
    aiDiv.appendChild(aiTitleDiv);

    const aiIcon = document.createElement('i');
    aiIcon.className = 'WusTeamGPT-title-icon';
    aiTitleDiv.appendChild(aiIcon);

    aiIcon.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="48px" height="48px" viewBox="0 0 48 48">
    <title>AI</title>
    <g id="&#x673A;&#x5668;&#x4EBA;" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
      <path d="M34.717885,5.03561087 C36.12744,5.27055371 37.079755,6.60373651 36.84481,8.0132786 L35.7944,14.3153359 L38.375,14.3153359 C43.138415,14.3153359 47,18.1768855 47,22.9402569 L47,34.4401516 C47,39.203523 43.138415,43.0650727 38.375,43.0650727 L9.625,43.0650727 C4.861585,43.0650727 1,39.203523 1,34.4401516 L1,22.9402569 C1,18.1768855 4.861585,14.3153359 9.625,14.3153359 L12.2056,14.3153359 L11.15519,8.0132786 C10.920245,6.60373651 11.87256,5.27055371 13.282115,5.03561087 C14.69167,4.80066802 16.024865,5.7529743 16.25981,7.16251639 L17.40981,14.0624532 C17.423955,14.1470924 17.43373,14.2315017 17.43948,14.3153359 L30.56052,14.3153359 C30.56627,14.2313867 30.576045,14.1470924 30.59019,14.0624532 L31.74019,7.16251639 C31.975135,5.7529743 33.30833,4.80066802 34.717885,5.03561087 Z M38.375,19.4902885 L9.625,19.4902885 C7.719565,19.4902885 6.175,21.0348394 6.175,22.9402569 L6.175,34.4401516 C6.175,36.3455692 7.719565,37.89012 9.625,37.89012 L38.375,37.89012 C40.280435,37.89012 41.825,36.3455692 41.825,34.4401516 L41.825,22.9402569 C41.825,21.0348394 40.280435,19.4902885 38.375,19.4902885 Z M14.8575,23.802749 C16.28649,23.802749 17.445,24.9612484 17.445,26.3902253 L17.445,28.6902043 C17.445,30.1191812 16.28649,31.2776806 14.8575,31.2776806 C13.42851,31.2776806 12.27,30.1191812 12.27,28.6902043 L12.27,26.3902253 C12.27,24.9612484 13.42851,23.802749 14.8575,23.802749 Z M33.1425,23.802749 C34.57149,23.802749 35.73,24.9612484 35.73,26.3902253 L35.73,28.6902043 C35.73,30.1191812 34.57149,31.2776806 33.1425,31.2776806 C31.71351,31.2776806 30.555,30.1191812 30.555,28.6902043 L30.555,26.3902253 C30.555,24.9612484 31.71351,23.802749 33.1425,23.802749 Z" id="&#x5F62;&#x72B6;&#x7ED3;&#x5408;" fill="#444444" fill-rule="nonzero"></path>
    </g>
    </svg>`;

    const aiTitleTextDiv = document.createElement('div');
    aiTitleTextDiv.className = 'WusTeamGPT-title-text';
    aiTitleTextDiv.textContent = 'WusTeam AI';
    aiTitleDiv.appendChild(aiTitleTextDiv);

    const aiTagDiv = document.createElement('div');
    aiTagDiv.className = 'WusTeamGPT-tag';
    aiTagDiv.id = 'WusTeamGPT-tag';
    aiTagDiv.innerHTML = 'Bot Ngu';
    aiTitleDiv.appendChild(aiTagDiv);

    // const aiExplanationDiv = document.createElement('div');
    // aiExplanationDiv.className = 'WusTeamGPT-explanation';
    // aiExplanationDiv.innerHTML = 'Đang tạo...' + '<span class="blinking-cursor"></span>';
    // aiDiv.appendChild(aiExplanationDiv); 
    // targetElement.insertBefore(aiDiv, targetElement.firstChild);
function ChatGPTSaidDefault(text, element, speed) {
  let i = 0;
  let cursorIndex = 0;
  const typingInterval = setInterval(() => {
    if (i <= text.length) {
      const displayedText = text.slice(0, i);
      const cursor = '';
      const newText = displayedText + cursor;
      element.innerHTML = newText; 

      i++;
      if (cursorIndex < i) {
        cursorIndex++;
      }
    } else {
      clearInterval(typingInterval); 
    }
  }, speed);

}

const aiExplanationDiv = document.createElement('div');
aiExplanationDiv.className = 'WusTeamGPT-explanation';
aiDiv.appendChild(aiExplanationDiv); 
targetElement.insertBefore(aiDiv, targetElement.firstChild);

const AI_Text = 'Hầu hết các mã nguồn trên trang này điều rút gọn link. Nếu bạn thấy liên kết không tồn tại hoặc không chính xác, xin vui lòng thông báo cho người xuất bản bài viết này hoặc cho ban quản trị  sẽ cập nhật liên kết đó ngay lập tức.';
const typingSpeed = 60;
ChatGPTSaidDefault(AI_Text, aiExplanationDiv, typingSpeed);
  }

  function removeExistingAIDiv() {
    const existingAIDiv = document.querySelector(".post-WusTeamGPT");

    if (existingAIDiv) {
      existingAIDiv.parentElement.removeChild(existingAIDiv);
    }
  }

  var WusTeamGPT = {
    getTitleAndContent: function() {
      try {
        const title = document.title;
        const container = document.querySelector(WusTeamGPT_postSelector);
        const paragraphs = container.getElementsByTagName('p');
        const headings = container.querySelectorAll('h1, h2, h3, h4, h5');
        let content = '';

        for (let h of headings) {
          content += h.innerText + ' ';
        }

        for (let p of paragraphs) {
          const filteredText = p.innerText.replace(/https?:\/\/[^\s]+/g, '');
          content += filteredText;
        }

        const combinedText = title + ' ' + content;
        let wordLimit = 1000;
        if (typeof WusTeamGPT_wordLimit !== "undefined") {
          wordLimit = WusTeamGPT_wordLimit;
        }
        const truncatedText = combinedText.slice(0, wordLimit);
        return truncatedText;
      } catch (e) {
        // console.error('Lỗi WusTeamGPT: Nó có thể chạy không bình thường do một hoặc nhiều lỗi Nguyên nhân là do không lấy được nội dung trong vùng chứa bài viết hoặc có thể do quá trình chuyển đổi bài viết bị lỗi.', e);
        return '';
      }
    },

    // fetchWusTeamGPT: async function(content) {
    //   var url = window.location.href;
    //   const title = document.title;
    //   const apiUrl = `https://chatgpt.thanhdieu.com/?content=${encodeURIComponent(content)}&key=${encodeURIComponent(WusTeamGPT_key)}&url=${encodeURIComponent(url)}&title=${encodeURIComponent(title)}`;
    //   const timeout = 20000; 

    //   try {
    //     const controller = new AbortController();
    //     const timeoutId = setTimeout(() => controller.abort(), timeout);
    //     const response = await fetch(apiUrl, { signal: controller.signal });
    //     if (response.ok) {
    //       const data = await response.json();
    //       return {
    //         summary: data.summary,
    //         audioId: data.id 
    //       };
    //     } else {
    //       if (response.status === 402) {
    //         document.querySelectorAll('.post-WusTeamGPT').forEach(el => {
    //           el.style.display = 'none';
    //         });
    //       }
    //       throw new Error('WusTeamGPT: Số dư không đủ, vui lòng nạp tiền và yêu cầu bài viết mới');
    //     }
    //   } catch (error) {
    //   }
    // },

    aiShowAnimation: function (text) {
      const element = document.querySelector(".WusTeamGPT-explanation");
      if (!element) {
        return;
      }

      if (WusTeamGPTIsRunning) {
        return;
      }

      if (typeof WusTeamGPT_typingAnimate !== "undefined" && !WusTeamGPT_typingAnimate) {
        element.innerHTML = text;
        return;
      }

      WusTeamGPTIsRunning = true;
      const typingDelay = 25;
      const waitingTime = 1000;
      const punctuationDelayMultiplier = 6;

      element.style.display = "block";
      element.innerHTML = "Đang tạo..." + '<span class="blinking-cursor"></span>';

      let animationRunning = true;
      let currentIndex = 0;
      let initialAnimation = true;
      let lastUpdateTime = performance.now();

      const animate = () => {
        if (currentIndex < text.length && animationRunning) {
          const currentTime = performance.now();
          const timeDiff = currentTime - lastUpdateTime;

          const letter = text.slice(currentIndex, currentIndex + 1);
          const isPunctuation = /[，。！、？,.!?]/.test(letter);
          const delay = isPunctuation ? typingDelay * punctuationDelayMultiplier : typingDelay;

          if (timeDiff >= delay) {
            element.innerText = text.slice(0, currentIndex + 1);
            lastUpdateTime = currentTime;
            currentIndex++;

            if (currentIndex < text.length) {
              element.innerHTML =
                text.slice(0, currentIndex) +
                '<span class="blinking-cursor"></span>';
            } else {
              element.innerHTML = text;
              element.style.display = "block";
              WusTeamGPTIsRunning = false;
              observer.disconnect();
            }
          }
          requestAnimationFrame(animate);
        }
      }

      const observer = new IntersectionObserver((entries) => {
        let isVisible = entries[0].isIntersecting;
        animationRunning = isVisible; 
        if (animationRunning && initialAnimation) {
          setTimeout(() => {
            requestAnimationFrame(animate);
          }, 200);
        }
      }, { threshold: 0 });
      let post_ai = document.querySelector('.post-WusTeamGPT');
      observer.observe(post_ai); 
    },
  }
  function runWusTeamGPT() {
    insertAIDiv(WusTeamGPT_postSelector);
    const content = WusTeamGPT.getTitleAndContent();
    // WusTeamGPT.fetchWusTeamGPT(content).then(data => {
    //   const summary = data.summary;
    //   const buttonDiv = document.querySelector('.WusTeamGPT-tag');
    //   buttonDiv.dataset.audioId = audioId; 
    //   WusTeamGPT.aiShowAnimation(summary);
    // })
  }

  function checkURLAndRun() {
    if (typeof WusTeamGPT_postURL === "undefined") {
      runWusTeamGPT();
      return;
    }

    try {
      const wildcardToRegExp = (s) => {
        return new RegExp('^' + s.split(/\*+/).map(regExpEscape).join('.*') + '$');
      };

      const regExpEscape = (s) => {
        return s.replace(/[|\\{}()[\]^$+*?.]/g, '\\{{input}}');
      };

      const urlPattern = wildcardToRegExp(WusTeamGPT_postURL);
      const currentURL = window.location.href;

      if (urlPattern.test(currentURL)) {
        runWusTeamGPT(); 
      } else {
        console.log("WusTeamGPT: Vì nó không đáp ứng các quy tắc liên kết tùy chỉnh nên tôi quyết định không triển khai chức năng tóm tắt.");
      }
    } catch (error) {
      console.error("WusTeamGPT: Tôi không hiểu quy tắc liên kết tùy chỉnh mà bạn viết nên quyết định không triển khai chức năng tóm tắt", error);
    }
  }

  if (usePjax) {
    checkURLAndRun();
  } else {
    document.addEventListener("DOMContentLoaded", function () {
      checkURLAndRun();
    });
  }
}

WusTeamGPT(false);

document.addEventListener('pjax:complete', function () {
  WusTeamGPT(true);
})

document.addEventListener('click', function (event) {
  const target = event.target;
  if (target.classList.contains('WusTeamGPT-tag')) {
    playAudio();
  }
});