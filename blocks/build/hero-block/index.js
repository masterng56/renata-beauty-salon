/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/hero-block/block.json":
/*!***********************************!*\
  !*** ./src/hero-block/block.json ***!
  \***********************************/
/***/ ((module) => {

module.exports = /*#__PURE__*/JSON.parse('{"$schema":"https://schemas.wp.org/trunk/block.json","apiVersion":3,"name":"masterng/hero-block","version":"0.1.0","title":"Hero block","category":"text","description":"Хироу блок","example":{},"supports":{"html":false,"color":{"background":true,"text":true}},"attributes":{"heroTitle":{"type":"string","source":"rich-text","selector":".site-title.main-title","default":"Салон красоты \\"renata\\""},"heroDesc":{"type":"string","source":"rich-text","selector":".site-slogan.font-releway.font24","default":"Запишись к профисеоналам прямо сейчас! Теперь Online!"},"backgroundImage":{"type":"string","default":"http://renata-block-theme.loc/wp-content/uploads/2025/04/cover-full-1.jpg"},"backgroundColor":{"type":"string"},"textColor":{"type":"string"},"gradientStartColor":{"type":"string","default":"rgba(0, 0, 0, 0.1)"},"gradientEndColor":{"type":"string","default":"rgba(255, 119, 119, 0.85)"},"gradientAngle":{"type":"number","default":0}},"textdomain":"masters","editorScript":"file:./index.js","editorStyle":"file:./index.css","style":"file:./style-index.css","viewScript":"file:./view.js"}');

/***/ }),

/***/ "./src/hero-block/edit.js":
/*!********************************!*\
  !*** ./src/hero-block/edit.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ Edit)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @wordpress/components */ "@wordpress/components");
/* harmony import */ var _wordpress_components__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _editor_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./editor.scss */ "./src/hero-block/editor.scss");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__);




function Edit({
  attributes,
  setAttributes
}) {
  const {
    heroTitle,
    heroDesc,
    backgroundImage,
    gradientStartColor,
    gradientEndColor,
    gradientAngle
  } = attributes;
  const onSelectImage = media => {
    setAttributes({
      backgroundImage: media.url
    });
  };
  const onRemoveImage = () => {
    setAttributes({
      backgroundImage: ""
    });
  };
  const blockProps = (0,_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.useBlockProps)({
    style: {
      background: `linear-gradient(${gradientAngle}deg, ${gradientStartColor} 24.51%, ${gradientEndColor} 99.9%), url(${backgroundImage})`,
      backgroundSize: "cover"
    }
  });
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.Fragment, {
    children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.InspectorControls, {
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
        title: "\u041D\u0430\u0441\u0442\u0440\u043E\u0439\u043A\u0438 \u0444\u043E\u043D\u0430",
        initialOpen: true,
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelRow, {
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.MediaUploadCheck, {
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.MediaUpload, {
              onSelect: onSelectImage,
              allowedTypes: ["image"],
              value: backgroundImage,
              render: ({
                open
              }) => /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
                onClick: open,
                variant: "primary",
                className: "editor-bg-image-button",
                children: backgroundImage ? "Изменить фоновое изображение" : "Выбрать фоновое изображение"
              })
            })
          })
        }), backgroundImage && /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelRow, {
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.Button, {
            onClick: onRemoveImage,
            isDestructive: true,
            variant: "secondary",
            children: "\u0423\u0434\u0430\u043B\u0438\u0442\u044C \u0444\u043E\u043D\u043E\u0432\u043E\u0435 \u0438\u0437\u043E\u0431\u0440\u0430\u0436\u0435\u043D\u0438\u0435"
          })
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.PanelBody, {
        title: "\u041D\u0430\u0441\u0442\u0440\u043E\u0439\u043A\u0438 \u0433\u0440\u0430\u0434\u0438\u0435\u043D\u0442\u0430",
        initialOpen: false,
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.PanelColorSettings, {
          colorSettings: [{
            value: gradientStartColor,
            onChange: color => setAttributes({
              gradientStartColor: color
            }),
            label: "Начальный цвет градиента"
          }, {
            value: gradientEndColor,
            onChange: color => setAttributes({
              gradientEndColor: color
            }),
            label: "Конечный цвет градиента"
          }]
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_components__WEBPACK_IMPORTED_MODULE_1__.RangeControl, {
          label: "\u0423\u0433\u043E\u043B \u0433\u0440\u0430\u0434\u0438\u0435\u043D\u0442\u0430",
          value: gradientAngle,
          onChange: value => setAttributes({
            gradientAngle: value
          }),
          min: 0,
          max: 360,
          step: 0.1
        })]
      })]
    }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("section", {
      ...blockProps,
      className: "row img-cover container-fluid shadow-two alignfull",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
        className: "container pb-5",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
          className: "site-titles",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsxs)("div", {
            className: "title-wrapper col-12 col-sm-7 col-lg-6 col-xl-5",
            children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("div", {
              className: "site-title main-title",
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.RichText, {
                tagName: "h1",
                value: heroTitle,
                onChange: value => setAttributes({
                  heroTitle: value
                }),
                placeholder: "Введите заголовок",
                allowedFormats: []
              })
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("p", {
              className: "site-slogan font-releway font24",
              children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.RichText, {
                tagName: "span",
                value: heroDesc,
                onChange: value => setAttributes({
                  heroDesc: value
                }),
                placeholder: "Введите описание",
                allowedFormats: []
              })
            }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_3__.jsx)("a", {
              href: "#appointment",
              className: "btn-appointment",
              type: "button",
              children: "\u0417\u0430\u043F\u0438\u0441\u0430\u0442\u044C\u0441\u044F"
            })]
          })
        })
      })
    })]
  });
}

/***/ }),

/***/ "./src/hero-block/editor.scss":
/*!************************************!*\
  !*** ./src/hero-block/editor.scss ***!
  \************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./src/hero-block/index.js":
/*!*********************************!*\
  !*** ./src/hero-block/index.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/blocks */ "@wordpress/blocks");
/* harmony import */ var _wordpress_blocks__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _style_scss__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./style.scss */ "./src/hero-block/style.scss");
/* harmony import */ var _edit__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./edit */ "./src/hero-block/edit.js");
/* harmony import */ var _save__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./save */ "./src/hero-block/save.js");
/* harmony import */ var _block_json__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./block.json */ "./src/hero-block/block.json");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__);






(0,_wordpress_blocks__WEBPACK_IMPORTED_MODULE_0__.registerBlockType)(_block_json__WEBPACK_IMPORTED_MODULE_4__.name, {
  icon: {
    src: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("svg", {
      width: 500,
      height: 500,
      viewBox: "0 0 500 500",
      fill: "none",
      xmlns: "http://www.w3.org/2000/svg",
      children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("rect", {
        width: 500,
        height: 500,
        fill: "#190C26"
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsxs)("g", {
        clipPath: "url(#clip0_220_75)",
        children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M77.0873 347.328H104.832V397.752H97.4574L96.7525 393.556C95.4105 395.144 93.7148 396.397 91.8006 397.216C89.8864 398.035 87.8066 398.398 85.7269 398.274C74.7376 398.274 67.4173 391.503 67.4173 380.554C67.3934 378.253 67.8272 375.969 68.6935 373.836C69.5598 371.702 70.8416 369.761 72.4648 368.124C74.088 366.486 76.0206 365.185 78.151 364.296C80.2814 363.407 82.5675 362.946 84.8774 362.942C85.9671 362.953 87.0544 363.043 88.1309 363.212V370.559C87.1824 370.388 86.2209 370.297 85.257 370.289C83.9078 370.257 82.5666 370.504 81.3178 371.014C80.069 371.523 78.9396 372.285 78.0007 373.251C77.0618 374.217 76.3338 375.366 75.8624 376.626C75.391 377.886 75.1865 379.229 75.2617 380.572C75.2617 387.073 79.5273 391.089 86.1065 391.089C92.6857 391.089 97.1501 386.227 97.1501 381.364V354.622H77.0873V347.328Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M115.062 347.328H175.811V397.752H168.057V354.676H149.332V397.698H141.578V354.676H122.816V397.698H115.062V347.328Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M231.607 372.54H193.542C193.542 382.769 200.067 391.197 210.677 391.197C215.212 391.159 219.567 389.423 222.877 386.335L230.252 389.558C225.372 395.681 219.208 398.346 210.677 398.346C195.982 398.346 185.607 387.541 185.607 372.486C185.607 357.431 195.982 346.536 209.105 346.536C223.365 346.536 231.68 356.675 231.68 372.108L231.607 372.54ZM223.727 365.193C222.96 361.905 221.08 358.981 218.404 356.912C215.728 354.842 212.419 353.754 209.032 353.829C202.128 353.829 196.832 357.899 194.753 365.193H223.727Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M265.244 347.328V354.532H255.105V397.698H247.369V354.622H240.464V347.418H247.369V333.011H255.105V347.418L265.244 347.328Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M311.389 397.698H303.635V367.624C303.635 357.233 299.894 353.829 293.459 353.829C288.145 353.829 282.849 358.259 282.849 365.985V397.698H275.095V318.1H282.921V350.966C284.362 349.517 286.081 348.374 287.975 347.603C289.87 346.833 291.901 346.451 293.947 346.482C306.202 346.482 311.461 354.532 311.461 367.624L311.389 397.698Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M365.414 347.328L331.976 422.964H323.77L338.411 389.612L319.306 347.292H327.765L342.568 379.978L357.263 347.328H365.414Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M375.59 386.515C376.666 387.901 378.031 389.038 379.592 389.847C381.152 390.655 382.871 391.116 384.628 391.197C389.508 391.197 393.231 388.388 393.231 383.813C393.231 379.978 390.411 377.078 384.194 373.891C378.247 370.811 372.084 366.687 372.084 360.006C372.084 352.046 377.868 346.482 386.128 346.482C390.628 346.482 394.948 348.967 398.382 353.361L392.725 357.539C392.014 356.41 391.032 355.477 389.867 354.823C388.703 354.168 387.392 353.815 386.055 353.793C385.22 353.706 384.376 353.803 383.583 354.077C382.79 354.352 382.067 354.798 381.467 355.382C380.866 355.967 380.402 356.676 380.108 357.46C379.814 358.244 379.697 359.082 379.765 359.916C379.765 363.14 382.856 364.977 387.61 367.408C396.647 371.982 400.931 377.132 400.931 383.903C400.931 393.412 393.43 398.31 384.664 398.31C381.797 398.365 378.956 397.761 376.361 396.546C373.766 395.332 371.486 393.538 369.698 391.305L375.59 386.515Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M433.212 347.328V354.532H423.072V397.698H415.336V354.622H408.432V347.418H415.336V333.011H423.072V347.418L433.212 347.328Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M433.049 178.876C431.584 173.983 428.572 169.692 424.463 166.641C420.353 163.59 415.364 161.942 410.239 161.942C405.114 161.942 400.126 163.59 396.016 166.641C391.906 169.692 388.895 173.983 387.429 178.876H351.37L348.912 176.409L321.149 148.766H302.641L332.88 178.876L339.658 185.63L333.35 191.861L302.623 222.475H321.131L348.894 194.814L351.858 191.861H387.303C388.683 196.867 391.674 201.283 395.818 204.43C399.962 207.578 405.029 209.283 410.239 209.283C415.45 209.283 420.516 207.578 424.66 204.43C428.804 201.283 431.796 196.867 433.176 191.861C434.351 187.587 434.307 183.072 433.049 178.822V178.876ZM418.987 191.861C417.634 193.669 415.747 195.011 413.59 195.697C411.433 196.383 409.115 196.379 406.96 195.686C404.806 194.993 402.923 193.645 401.576 191.832C400.229 190.019 399.485 187.831 399.449 185.576C399.449 182.71 400.591 179.962 402.625 177.935C404.659 175.909 407.417 174.77 410.293 174.77C412.276 174.794 414.214 175.358 415.897 176.401C417.58 177.445 418.944 178.928 419.84 180.69C420.736 182.452 421.13 184.424 420.98 186.394C420.83 188.363 420.141 190.254 418.987 191.861Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M160.429 185.63L197.446 148.766H178.938L148.717 178.876H112.694C111.118 173.375 107.6 168.627 102.787 165.507C97.9743 162.387 92.1919 161.105 86.5055 161.898C80.8191 162.691 75.6119 165.505 71.8436 169.821C68.0754 174.138 66 179.666 66 185.386C66 191.107 68.0754 196.635 71.8436 200.952C75.6119 205.268 80.8191 208.082 86.5055 208.875C92.1919 209.668 97.9743 208.386 102.787 205.266C107.6 202.146 111.118 197.398 112.694 191.897H148.211L151.175 194.85L178.938 222.475H197.446L166.719 191.861L160.429 185.63ZM89.8299 196.129C87.4109 196.128 85.0632 195.313 83.1672 193.816C81.2712 192.319 79.938 190.229 79.3837 187.883C78.8295 185.537 79.0866 183.073 80.1134 180.891C81.1402 178.708 82.8766 176.936 85.0411 175.86C87.2056 174.784 89.6713 174.467 92.0388 174.962C94.4062 175.457 96.5365 176.734 98.0845 178.586C99.6325 180.438 100.507 182.757 100.567 185.166C100.628 187.575 99.8692 189.934 98.4154 191.861C97.4088 193.18 96.1109 194.252 94.6221 194.992C93.1334 195.732 91.4937 196.121 89.8299 196.129Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M205.2 98.7565C207.525 94.0539 208.221 88.7163 207.179 83.5779C206.137 78.4396 203.416 73.79 199.44 70.3559C195.465 66.9219 190.46 64.8968 185.207 64.5972C179.954 64.2977 174.749 65.7405 170.407 68.7002C166.722 71.188 163.806 74.6488 161.984 78.695C159.905 83.3331 159.377 88.5139 160.478 93.4736C161.578 98.4334 164.249 102.91 168.096 106.243C171.943 109.575 176.763 111.588 181.846 111.985C186.929 112.382 192.005 111.141 196.326 108.445L242.76 148.64L242.904 148.766H242.705L221.576 191.861L215.629 203.998L206.592 222.475L188.517 259.357C187.134 259.102 185.731 258.976 184.324 258.978C178.763 258.974 173.377 260.909 169.098 264.449C164.82 267.988 161.921 272.908 160.903 278.355C159.885 283.802 160.814 289.432 163.527 294.268C166.24 299.104 170.567 302.841 175.757 304.831C180.946 306.82 186.672 306.937 191.939 305.16C197.206 303.384 201.682 299.826 204.592 295.104C207.501 290.383 208.659 284.795 207.866 279.311C207.073 273.828 204.377 268.794 200.248 265.083L221.16 222.475L225.86 212.859L231.788 200.865L252.99 157.644L257.255 148.928L258.918 145.525L205.2 98.7565ZM194.536 89.5181C194.271 91.8605 193.245 94.0522 191.613 95.7591C189.981 97.4661 187.834 98.5946 185.499 98.9726C184.943 99.0607 184.381 99.1028 183.818 99.0986C180.942 99.0986 178.183 97.9603 176.15 95.9339C174.116 93.9075 172.973 91.1592 172.973 88.2935V88.0954C173.026 85.7377 173.851 83.4618 175.322 81.6149C176.794 79.7681 178.832 78.4516 181.125 77.8666C181.987 77.647 182.874 77.5381 183.764 77.5424C186.64 77.5424 189.398 78.6808 191.432 80.7072C193.466 82.7335 194.609 85.4819 194.609 88.3476C194.5 88.7437 194.482 89.212 194.446 89.5181H194.536ZM195.223 282.732C195.236 284.786 194.66 286.801 193.564 288.541C192.468 290.281 190.897 291.674 189.035 292.556C187.173 293.438 185.097 293.773 183.051 293.521C181.004 293.269 179.072 292.442 177.481 291.135C175.89 289.829 174.706 288.097 174.067 286.144C173.429 284.191 173.362 282.097 173.875 280.107C174.389 278.117 175.461 276.315 176.965 274.911C178.47 273.506 180.346 272.559 182.372 272.179C183.057 272.049 183.753 271.983 184.451 271.981C187.327 271.981 190.085 273.119 192.119 275.145C194.153 277.172 195.295 279.92 195.295 282.786L195.223 282.732Z",
          fill: "#E4D8F2"
        }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("path", {
          d: "M315.853 259.014C311.378 258.99 306.988 260.239 303.201 262.616L256.894 222.475L278.077 179.255L284.024 167.117L293.061 148.784L311.588 110.966C313.163 111.294 314.768 111.457 316.378 111.452C322.408 111.473 328.222 109.212 332.644 105.126C337.066 101.04 339.767 95.4344 340.201 89.4412C340.635 83.448 338.769 77.5141 334.981 72.8385C331.193 68.1629 325.765 65.0941 319.794 64.2521C318.638 64.0856 317.473 64.0013 316.305 64C311.548 63.9982 306.9 65.4175 302.961 68.0747C299.022 70.7318 295.973 74.5047 294.208 78.9059C292.443 83.3072 292.043 88.1346 293.06 92.7646C294.076 97.3947 296.463 101.615 299.912 104.879L278.421 148.766L273.884 158.239L267.938 170.376L246.754 213.597L242.326 222.475L240.735 225.753L294.471 272.287C292.176 276.979 291.499 282.294 292.545 287.409C293.59 292.523 296.299 297.151 300.253 300.576C304.207 304 309.184 306.029 314.413 306.348C319.642 306.668 324.83 305.26 329.174 302.343C332.849 299.857 335.759 296.403 337.579 292.366C338.955 289.327 339.664 286.03 339.658 282.696C339.648 276.412 337.136 270.388 332.673 265.948C328.21 261.508 322.16 259.014 315.853 259.014ZM313.377 77.3623C314.331 77.0997 315.316 76.9665 316.305 76.9661C318.952 77.1168 321.452 78.2283 323.332 80.0906C325.213 81.953 326.343 84.4371 326.51 87.0735C326.677 89.7098 325.869 92.3158 324.238 94.3988C322.608 96.4817 320.268 97.8974 317.661 98.3783C317.209 98.4052 316.757 98.4052 316.305 98.3783C314.165 98.3741 312.074 97.7393 310.296 96.5536C308.517 95.3679 307.13 93.6844 306.31 91.7151C305.787 90.4215 305.517 89.04 305.515 87.6452C305.538 85.3158 306.315 83.0561 307.732 81.2031C309.149 79.35 311.129 78.0028 313.377 77.3623ZM318.492 293.14C317.63 293.36 316.743 293.469 315.853 293.465C312.977 293.465 310.219 292.326 308.185 290.3C306.151 288.274 305.009 285.525 305.009 282.66C305.009 282.263 305.009 281.867 305.009 281.489C305.277 279.15 306.306 276.962 307.937 275.259C309.568 273.555 311.713 272.43 314.046 272.052C314.601 271.959 315.164 271.911 315.727 271.908C318.603 271.908 321.362 273.047 323.395 275.073C325.429 277.1 326.572 279.848 326.572 282.714V282.894C326.528 285.245 325.715 287.518 324.257 289.367C322.799 291.216 320.775 292.541 318.492 293.14Z",
          fill: "#E4D8F2"
        })]
      }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("defs", {
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("clipPath", {
          id: "clip0_220_75",
          children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_5__.jsx)("rect", {
            width: 368,
            height: 359,
            fill: "white",
            transform: "translate(66 64)"
          })
        })
      })]
    })
  },
  edit: _edit__WEBPACK_IMPORTED_MODULE_2__["default"],
  save: _save__WEBPACK_IMPORTED_MODULE_3__["default"]
});

/***/ }),

/***/ "./src/hero-block/save.js":
/*!********************************!*\
  !*** ./src/hero-block/save.js ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* binding */ save)
/* harmony export */ });
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @wordpress/block-editor */ "@wordpress/block-editor");
/* harmony import */ var _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! react/jsx-runtime */ "react/jsx-runtime");
/* harmony import */ var react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__);


function save({
  attributes
}) {
  const {
    heroTitle,
    heroDesc,
    backgroundImage,
    gradientStartColor,
    gradientEndColor,
    gradientAngle
  } = attributes;
  const blockProps = _wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.useBlockProps.save({
    style: {
      background: `linear-gradient(${gradientAngle}deg, ${gradientStartColor} 24.51%, ${gradientEndColor} 99.9%), url(${backgroundImage})`,
      backgroundSize: 'cover'
    }
  });
  return /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("section", {
    ...blockProps,
    className: "row img-cover container-fluid shadow-two alignfull",
    children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
      className: "container pb-5",
      children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
        className: "site-titles",
        children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsxs)("div", {
          className: "title-wrapper col-12 col-sm-7 col-lg-6 col-xl-5",
          children: [/*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("div", {
            className: "site-title main-title",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.RichText.Content, {
              tagName: "h1",
              value: heroTitle
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("p", {
            className: "site-slogan font-releway font24",
            children: /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)(_wordpress_block_editor__WEBPACK_IMPORTED_MODULE_0__.RichText.Content, {
              tagName: "span",
              value: heroDesc
            })
          }), /*#__PURE__*/(0,react_jsx_runtime__WEBPACK_IMPORTED_MODULE_1__.jsx)("a", {
            href: "#appointment",
            className: "btn-appointment",
            type: "button",
            children: "\u0417\u0430\u043F\u0438\u0441\u0430\u0442\u044C\u0441\u044F"
          })]
        })
      })
    })
  });
}

/***/ }),

/***/ "./src/hero-block/style.scss":
/*!***********************************!*\
  !*** ./src/hero-block/style.scss ***!
  \***********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "@wordpress/block-editor":
/*!*************************************!*\
  !*** external ["wp","blockEditor"] ***!
  \*************************************/
/***/ ((module) => {

module.exports = window["wp"]["blockEditor"];

/***/ }),

/***/ "@wordpress/blocks":
/*!********************************!*\
  !*** external ["wp","blocks"] ***!
  \********************************/
/***/ ((module) => {

module.exports = window["wp"]["blocks"];

/***/ }),

/***/ "@wordpress/components":
/*!************************************!*\
  !*** external ["wp","components"] ***!
  \************************************/
/***/ ((module) => {

module.exports = window["wp"]["components"];

/***/ }),

/***/ "react/jsx-runtime":
/*!**********************************!*\
  !*** external "ReactJSXRuntime" ***!
  \**********************************/
/***/ ((module) => {

module.exports = window["ReactJSXRuntime"];

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = __webpack_modules__;
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/chunk loaded */
/******/ 	(() => {
/******/ 		var deferred = [];
/******/ 		__webpack_require__.O = (result, chunkIds, fn, priority) => {
/******/ 			if(chunkIds) {
/******/ 				priority = priority || 0;
/******/ 				for(var i = deferred.length; i > 0 && deferred[i - 1][2] > priority; i--) deferred[i] = deferred[i - 1];
/******/ 				deferred[i] = [chunkIds, fn, priority];
/******/ 				return;
/******/ 			}
/******/ 			var notFulfilled = Infinity;
/******/ 			for (var i = 0; i < deferred.length; i++) {
/******/ 				var [chunkIds, fn, priority] = deferred[i];
/******/ 				var fulfilled = true;
/******/ 				for (var j = 0; j < chunkIds.length; j++) {
/******/ 					if ((priority & 1 === 0 || notFulfilled >= priority) && Object.keys(__webpack_require__.O).every((key) => (__webpack_require__.O[key](chunkIds[j])))) {
/******/ 						chunkIds.splice(j--, 1);
/******/ 					} else {
/******/ 						fulfilled = false;
/******/ 						if(priority < notFulfilled) notFulfilled = priority;
/******/ 					}
/******/ 				}
/******/ 				if(fulfilled) {
/******/ 					deferred.splice(i--, 1)
/******/ 					var r = fn();
/******/ 					if (r !== undefined) result = r;
/******/ 				}
/******/ 			}
/******/ 			return result;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/jsonp chunk loading */
/******/ 	(() => {
/******/ 		// no baseURI
/******/ 		
/******/ 		// object to store loaded and loading chunks
/******/ 		// undefined = chunk not loaded, null = chunk preloaded/prefetched
/******/ 		// [resolve, reject, Promise] = chunk loading, 0 = chunk loaded
/******/ 		var installedChunks = {
/******/ 			"hero-block/index": 0,
/******/ 			"hero-block/style-index": 0
/******/ 		};
/******/ 		
/******/ 		// no chunk on demand loading
/******/ 		
/******/ 		// no prefetching
/******/ 		
/******/ 		// no preloaded
/******/ 		
/******/ 		// no HMR
/******/ 		
/******/ 		// no HMR manifest
/******/ 		
/******/ 		__webpack_require__.O.j = (chunkId) => (installedChunks[chunkId] === 0);
/******/ 		
/******/ 		// install a JSONP callback for chunk loading
/******/ 		var webpackJsonpCallback = (parentChunkLoadingFunction, data) => {
/******/ 			var [chunkIds, moreModules, runtime] = data;
/******/ 			// add "moreModules" to the modules object,
/******/ 			// then flag all "chunkIds" as loaded and fire callback
/******/ 			var moduleId, chunkId, i = 0;
/******/ 			if(chunkIds.some((id) => (installedChunks[id] !== 0))) {
/******/ 				for(moduleId in moreModules) {
/******/ 					if(__webpack_require__.o(moreModules, moduleId)) {
/******/ 						__webpack_require__.m[moduleId] = moreModules[moduleId];
/******/ 					}
/******/ 				}
/******/ 				if(runtime) var result = runtime(__webpack_require__);
/******/ 			}
/******/ 			if(parentChunkLoadingFunction) parentChunkLoadingFunction(data);
/******/ 			for(;i < chunkIds.length; i++) {
/******/ 				chunkId = chunkIds[i];
/******/ 				if(__webpack_require__.o(installedChunks, chunkId) && installedChunks[chunkId]) {
/******/ 					installedChunks[chunkId][0]();
/******/ 				}
/******/ 				installedChunks[chunkId] = 0;
/******/ 			}
/******/ 			return __webpack_require__.O(result);
/******/ 		}
/******/ 		
/******/ 		var chunkLoadingGlobal = globalThis["webpackChunkmasters"] = globalThis["webpackChunkmasters"] || [];
/******/ 		chunkLoadingGlobal.forEach(webpackJsonpCallback.bind(null, 0));
/******/ 		chunkLoadingGlobal.push = webpackJsonpCallback.bind(null, chunkLoadingGlobal.push.bind(chunkLoadingGlobal));
/******/ 	})();
/******/ 	
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module depends on other loaded chunks and execution need to be delayed
/******/ 	var __webpack_exports__ = __webpack_require__.O(undefined, ["hero-block/style-index"], () => (__webpack_require__("./src/hero-block/index.js")))
/******/ 	__webpack_exports__ = __webpack_require__.O(__webpack_exports__);
/******/ 	
/******/ })()
;
//# sourceMappingURL=index.js.map