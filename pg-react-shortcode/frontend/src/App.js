import React from "react";

const REDIRECT_URL = {
  deepLink: {
    dev: "goodmoneydev://app",
    pen: "goodmoneypen://app",
    uat: "goodmoneyuat://app",
    prod: "goodmoney://app",
  },
  fallbackIosID: {
    dev: "6476854255",
    uat: "6476854142",
    pen: "6477866380",
    prod: "6476857961",
  },
  fallbackIosURL: "https://apps.apple.com/app/id",
  fallbackAndroidAppID: {
    dev: "com.moneydd.goodmoneydev",
    pen: "com.moneydd.goodmoneypen",
    uat: "com.moneydd.goodmoneyuat",
    prod: "com.moneydd.goodmoney",
  },
  fallbackAndroidURLdeepLink: "market://details?id=",
  fallbackAndroidURL: "https://play.google.com/store/apps/details?id=",
};

const Home = () => {
  const getMobileOS = () => {
    const ua = navigator.userAgent;
    if (/android/i.test(ua)) return "Android";
    if (/iPad|iPhone|iPod/.test(ua)) return "iOS";
    return "Other";
  };

  const handleAppRedirect = React.useCallback(() => {
    const environment = window.location.search.split("?environment=")[1];
    let change = false;
    // Try to open the when user click in the "confirm" in popup
    window.location.replace(
      `${REDIRECT_URL.deepLink[environment ?? "prod"]}${
        window.location.pathname
      }`
    );
    switch (getMobileOS()) {
      case "Android":
        setTimeout(() => {
          // If the app is not installed,
          // then the user is redirect to the Play Store
          if (!change) {
            window.location.replace(
              `${REDIRECT_URL.fallbackAndroidURL}${
                REDIRECT_URL.fallbackAndroidAppID[environment ?? "prod"]
              }`
            );
          }
        }, 5000);
        break;
      case "iOS":
        setTimeout(() => {
          // If the app is not installed
          // then the user is reedirect to the App Store
          if (!change) {
            window.location.replace(
              `${REDIRECT_URL.fallbackIosURL}${
                REDIRECT_URL.fallbackIosID[environment ?? "prod"]
              }`
            );
          }
        }, 5000);
        break;

      default: 
        break;
    }
    window.onblur = function () {
      change = true;
    };
    window.onfocus = function () {
      change = false;
    };
  }, []);

  React.useEffect(() => {
    handleAppRedirect();
  }, [handleAppRedirect]);

  return <></>;
};

export default Home;

//########################################   Code 2 ###############################################
// import React from "react";

// const REDIRECT_URL = {
//   deepLink: {
//     dev: "goodmoneydev://app",
//     pen: "goodmoneypen://app",
//     uat: "goodmoneyuat://app",
//     prod: "goodmoney://app",
//   },
//   fallbackIosID: {
//     dev: "6476854255",
//     uat: "6476854142",
//     pen: "6477866380",
//     prod: "6476857961",
//   },
//   fallbackIosURL: "https://apps.apple.com/app/id",
//   fallbackAndroidAppID: {
//     dev: "com.moneydd.goodmoneydev",
//     pen: "com.moneydd.goodmoneypen",
//     uat: "com.moneydd.goodmoneyuat",
//     prod: "com.moneydd.goodmoney",
//   },
//   fallbackAndroidURLdeepLink: "market://details?id=",
//   fallbackAndroidURL: "https://play.google.com/store/apps/details?id=",
// };

// const Home = () => {
//   const getMobileOS = () => {
//     const ua = navigator.userAgent;
//     if (/android/i.test(ua)) return "Android";
//     if (/iPad|iPhone|iPod/.test(ua)) return "iOS";
//     return "Other";
//   };

//   const handleAppRedirect = React.useCallback(() => {
//     const environment = window.location.search.split("?environment=")[1] || "prod";
//     if (!REDIRECT_URL.deepLink[environment]) {
//       console.error("Invalid environment:", environment);
//       return;
//     }

//     let change = false;

//     // Try to open the app when the user clicks "confirm" in popup
//     window.location.replace(
//       `${REDIRECT_URL.deepLink[environment]}${window.location.pathname}`
//     );

//     const redirectFallback = () => {
//       switch (getMobileOS()) {
//         case "Android":
//           setTimeout(() => {
//             if (!change) {
//               window.location.replace(
//                 `${REDIRECT_URL.fallbackAndroidURL}${REDIRECT_URL.fallbackAndroidAppID[environment]}`
//               );
//             }
//           }, 5000);
//           break;
//         case "iOS":
//           setTimeout(() => {
//             if (!change) {
//               window.location.replace(
//                 `${REDIRECT_URL.fallbackIosURL}${REDIRECT_URL.fallbackIosID[environment]}`
//               );
//             }
//           }, 5000);
//           break;
//         default:
//           break;
//       }
//     };

//     window.addEventListener('blur', () => { change = true; });
//     window.addEventListener('focus', () => { change = false; });

//     redirectFallback();

//     return () => {
//       window.removeEventListener('blur', () => { change = true; });
//       window.removeEventListener('focus', () => { change = false; });
//     };
//   }, []);

//   React.useEffect(() => {
//     handleAppRedirect();
//   }, [handleAppRedirect]);

//   return <></>;
// };

// export default Home;


//########################################   Code 3 ###############################################
// import React from "react";

// const REDIRECT_URL = {
//   deepLink: {
//     dev: "goodmoneydev://app",
//     pen: "goodmoneypen://app",
//     uat: "goodmoneyuat://app",
//     prod: "goodmoney://app",
//   },
//   fallbackIosID: {
//     dev: "6476854255",
//     uat: "6476854142",
//     pen: "6477866380",
//     prod: "6476857961",
//   },
//   fallbackIosURL: "https://apps.apple.com/app/id",
//   fallbackAndroidAppID: {
//     dev: "com.moneydd.goodmoneydev",
//     pen: "com.moneydd.goodmoneypen",
//     uat: "com.moneydd.goodmoneyuat",
//     prod: "com.moneydd.goodmoney",
//   },
//   fallbackAndroidURL: "https://play.google.com/store/apps/details?id=",
// };

// const Home = () => {
//   const getMobileOS = () => {
//     const ua = navigator.userAgent;
//     if (/android/i.test(ua)) return "Android";
//     if (/iPad|iPhone|iPod/.test(ua)) return "iOS";
//     return "Other";
//   };

//   const handleAppRedirect = React.useCallback(() => {
//     const params = new URLSearchParams(window.location.search);
//     const environment = params.get('environment') || "prod";
    
//     if (!REDIRECT_URL.deepLink[environment]) {
//       console.error("Invalid environment:", environment);
//       return;
//     }

//     const os = getMobileOS();
//     let change = false;

//     const handleVisibilityChange = () => {
//       if (document.hidden) {
//         change = true;
//       }
//     };

//     document.addEventListener('visibilitychange', handleVisibilityChange);

//     const deepLink = `${REDIRECT_URL.deepLink[environment]}${window.location.pathname}`;
//     const iosFallback = `${REDIRECT_URL.fallbackIosURL}${REDIRECT_URL.fallbackIosID[environment]}`;
//     const androidFallback = `${REDIRECT_URL.fallbackAndroidURL}${REDIRECT_URL.fallbackAndroidAppID[environment]}`;

//     // Attempt to open the app
//     window.location.replace(deepLink);

//     const redirectFallback = () => {
//       setTimeout(() => {
//         if (!change) {
//           if (os === "Android") {
//             window.location.replace(androidFallback);
//           } else if (os === "iOS") {
//             window.location.replace(iosFallback);
//           }
//         }
//       }, 2000); // 2 seconds should be sufficient to detect if the app is not installed
//     };

//     redirectFallback();

//     // Cleanup event listeners on component unmount
//     return () => {
//       document.removeEventListener('visibilitychange', handleVisibilityChange);
//     };
//   }, []);

//   React.useEffect(() => {
//     handleAppRedirect();
//   }, [handleAppRedirect]);

//   return <></>;
// };

// export default Home;
