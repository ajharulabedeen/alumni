/**
 * Javascript embedded onto sites for Recommendation Pages app
 * Use http://jscompress.com/ before uploading to database: Apps.AppJavascript
 */
(function (definedOpts) {
    var opts = {
        activeAdTester: definedOpts.activeLayoutTester,
        activeLayoutTester: true,
        imgsShown: false,
        isLayoutTester: isLayoutTester(),
        isOn: definedOpts.isOn === "true",
        showImages: definedOpts.showImages === "true" || definedOpts.showImages === "",
        theme: definedOpts.theme,
        locations: definedOpts.locations,
        title: definedOpts.title,
        showSocial: definedOpts.showSocial === "true",
        fbURL: definedOpts.fbURL,
        twitterURL: definedOpts.twitterURL,
        gplusURL: definedOpts.gplusURL,
        contentURL: definedOpts.contentURL,
        swipe: definedOpts.swipe === "true"
    };

    var recommendedVals = {
        img: "",
        description: "",
        title: document.title
    };

    function init() {
        if (opts.isOn === false) return;
        findRecommendedImage();
        findRecommendedDescription();
        appRequest();
    }

    function appRequest() {
        var params = {
            URL: _ezaq.url,
            ImageURL: recommendedVals.img,
            AppName: "Recommended Pages",
            Title: recommendedVals.title,
            Description: recommendedVals.description
        };
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '/ezoic/app-ajax', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            var response = JSON.parse(this.response);
            if (response.Status === true && typeof response.Pages !== "undefined" && response.Pages.length > 0) {
                if (opts.activeAdTester === true || opts.isLayoutTester === false) return;
                show(response.Pages);
            }
        };
        xhr.send(buildUrl(params));
    }

    function buildUrl(parameters) {
        var qs = "";
        for (var key in parameters) {
            if (parameters.hasOwnProperty(key) === false) continue;
            var value = parameters[key];
            qs += encodeURIComponent(key) + "=" + encodeURIComponent(value) + "&";
        }
        if (qs.length > 0) {
            qs = qs.substring(0, qs.length - 1); //chop off last "&"
        }
        return qs;
    }

    function findRecommendedImage() {
        if (opts.showImages === false) return;

        var definedImg = document.querySelector("img[data-ezoic-recommended='image']");
        if (definedImg !== null && definedImg.src !== "") {
            recommendedVals.img = definedImg.src;
            return;
        }

        var imgs = document.querySelectorAll("img");
        if (imgs.length === 0) return;

        var largestSize = 0;
        var ob = document.querySelector(".OUTBRAIN");
        for (var i = 0; i < imgs.length; i++) {
            var img = imgs[i];
            var width = img.offsetWidth, height = img.offsetHeight, size = width * height;
            if (img.src === "" || width < 25 || height < 25) continue;
            if (ob !== null && ob.contains(img) === true) continue;
            if (size > largestSize) {
                largestSize = size;
                recommendedVals.img = img.src;
            }
        }
    }

    function findRecommendedDescription() {
        var description = document.querySelector("meta[name*='description'],meta[property*='description']");
        if (description !== null && description.content !== "") {
            recommendedVals.description = description.content;
        } else {
            //fallback here
        }
    }

    function fixTextOverflow() {
        var titles = document.querySelectorAll(".ezoic-recommended-tall .ezoic-recommended-page-title");
        for (var i = 0; i < titles.length; i++) {
            var title = titles[i];
            var element_text = title.innerText, text_array = element_text.split(/\s+/);
            var mainEl = title.parentNode.parentNode;
            if (mainEl !== null) mainEl.setAttribute("title", element_text);

            var tempElement = title.cloneNode(true);
            tempElement.setAttribute("style", "display:block;position:absolute;top:-100;left:-100;overflow:visible;width:" + title.offsetWidth + "px;height:auto;");
            title.parentNode.insertBefore(tempElement, title.nextSibling);

            var word_count = 0, remove_text = false;
            for (var j = 0; j < text_array.length; j++) {
                word_count = j;
                tempElement.textContent = text_array.slice(0, j + 1).join(" ") + (j === text_array.length ? "" : "...");
                if (tempElement.offsetHeight > title.offsetHeight) {
                    remove_text = true;
                    break;
                }
            }

            tempElement.parentNode.removeChild(tempElement);
            if (!remove_text) continue;
            title.textContent = text_array.slice(0, word_count).join(" ") + "...";
        }
    }

    function isLayoutTester() {
        return document.querySelector("#stylesheet_body") !== null || typeof _ezaq === "undefined";
    }

    function show(pgs) {
        var style = document.createElement("link");
        style.setAttribute("rel", "stylesheet");
        style.setAttribute("type", "text/css");
        style.setAttribute("href", "/utilcave_com/apps/css/recommended-pages.css?cb=8");
        style.onload = function () {
            var shown = false;
            if (opts.swipe === true) {
                initSwipe(pgs);
            }
            if (opts.locations === "both" || opts.locations === "bottom") {
                if (document.querySelector("#stylesheet_body") !== null) {
                    document.querySelector("#stylesheet_body").appendChild(showTallWidget(pgs));
                    shown = true;
                }
            }
            if (opts.locations === "both" || opts.locations === "sidebar") {
                var side = document.querySelector(".ezSidebar.ezCSS");
                if (side !== null && side.firstChild !== null) {
                    var simgs = opts.showImages === true;
                    if (side.offsetWidth <= 200 && ezoFormfactor !== '2') simgs = false;
                    side.insertBefore(showSidebarWidget(pgs, simgs), side.firstChild);
                    shown = true;
                }
            }
            if (shown) {
                setTimeout(fixTextOverflow, 0);
            }
        };
        document.getElementsByTagName("head")[0].appendChild(style);

        showSocialBar(pgs);
    }

    function initSwipe(pgs) {
        if (pgs.length < 1) return;
        var nt = document.createElement("link");
        nt.setAttribute("rel", "next");
        nt.setAttribute("href", pgs[0].URL);
        document.getElementsByTagName("head")[0].appendChild(nt);
        var nt = document.createElement("link");
        nt.setAttribute("rel", "prev");
        nt.setAttribute("href", "#");
        document.getElementsByTagName("head")[0].appendChild(nt);
        window.swipePageNav.init();
    }

    function showSocialBar(pages) {
        if (opts.showSocial === false || ezoFormfactor !== '2') return;

        var style = document.createElement("link");
        style.setAttribute("rel", "stylesheet");
        style.setAttribute("type", "text/css");
        style.setAttribute("href", "/utilcave_com/ssk/dist/css/social-share-kit.css?cb=4");
        document.getElementsByTagName("head")[0].appendChild(style);

        var scr = document.createElement("script");
        scr.setAttribute("async", "");
        scr.setAttribute("src", "/utilcave_com/ssk/dist/js/social-share-kit.js");
        scr.onload = function () {
            document.getElementsByTagName("head")[0].appendChild(scr);

            var isBottomAd = false;
            if (typeof _ezaq !== "undefined" && typeof _ezaq.ad_location_ids !== "undefined") {
                var alids = _ezaq.ad_location_ids.split(",");
                if (alids.indexOf("5") >= 0) {
                    isBottomAd = true;
                }
            }

            var adClass = isBottomAd ? " ssk-bottom-with-ad" : "";

            var mainSSK = document.createElement("div");
            mainSSK.setAttribute("class", "ssk-group ssk-sticky ssk-bottom" + adClass);

            var fbLink = document.createElement("a");
            fbLink.setAttribute("href", "");
            fbLink.setAttribute("class", "ssk ssk-facebook ssk-lg");
            fbLink.setAttribute("data-url", opts.fbURL);
            mainSSK.appendChild(fbLink);

            var twitterLink = document.createElement("a");
            twitterLink.setAttribute("href", "");
            twitterLink.setAttribute("class", "ssk ssk-twitter ssk-lg");
            twitterLink.setAttribute("data-url", opts.twitterURL);
            mainSSK.appendChild(twitterLink);

            var gplusLink = document.createElement("a");
            gplusLink.setAttribute("href", "");
            gplusLink.setAttribute("class", "ssk ssk-google-plus ssk-lg");
            gplusLink.setAttribute("data-url", opts.gplusURL);
            mainSSK.appendChild(gplusLink);

            var pintLink = document.createElement("a");
            pintLink.setAttribute("href", "");
            pintLink.setAttribute("class", "ssk ssk-pinterest ssk-lg");
            mainSSK.appendChild(pintLink);

            if (pages.length > 0) {
                if (pages[0].URL.length > 0) {
                    var nextLink = document.createElement("a");
                    nextLink.setAttribute("href", pages[0].URL);
                    nextLink.setAttribute("title", pages[0].Title);
                    nextLink.setAttribute("class", "ssk ssk-clouds");
                    nextLink.setAttribute("style", "flex:4;text-align:center;line-height:32px;font-size:14px;font-family:HelveticaNeue-Light, Roboto, sans-serif;color:black");
                    nextLink.innerHTML = '<span style="display:inline-block;vertical-align:middle;">NEXT ARTICLE</span><span style="display:inline-block;vertical-align:middle;"><img src="/utilcave_com/ssk/dist/arrow.png" />';
                    mainSSK.appendChild(nextLink);
                }
            }

            document.getElementsByTagName("body")[0].appendChild(mainSSK);

            var initScr = document.createElement("script");
            initScr.innerText = "SocialShareKit.init();";
            document.getElementsByTagName("body")[0].appendChild(initScr);
        };

        document.getElementsByTagName("head")[0].appendChild(scr);
    }

    function showTallWidget(pages) {
        var mainCnt = document.createElement("div");
        mainCnt.setAttribute("class", "ezoic-recommended-pages");

        for (var i = 0; i < pages.length; i++) {
            var page = pages[i];

            var pageEl = document.createElement("a");
            pageEl.setAttribute("class", "ezoic-recommended-page");
            pageEl.setAttribute("href", page.URL);
            __ez.evt.add(pageEl, 'click', function() { // add a cookie onclick to track recommended page visit data
                var expires = new Date();
                expires.setTime(expires.getTime() + (30 * 60 * 1000)); // set cookie to expire 30 minutes from now
                var domain = window.location.host.replace("www", "");
                if (domain[0] !== ".") { // all cookie domains should have a dot in front ex. .brighthubengineering.com
                    domain = "." + domain;
                }
                document.cookie = "ez_recommended_pages=true; expires=" + expires.toUTCString() + "; domain=" + domain + "; path=/";
            });
            if (opts.theme === "dark") pageEl.classList.add("ezoic-recommended-dark");

            if (page.Image && opts.showImages === true) {
                var imgEl = document.createElement("div");
                imgEl.setAttribute("class", "ezoic-recommended-page-img");
                imgEl.setAttribute("style", "background-image:url(" + page.Image + ")");
                pageEl.appendChild(imgEl);
                opts.imgsShown = true;
            } else {
                pageEl.classList.add("ezoic-recommended-page-no-image");
            }

            var titleEl = document.createElement("div");
            titleEl.setAttribute("class", "ezoic-recommended-page-title");
            titleEl.innerHTML = page.Title;

            var site = document.createElement("div");
            site.setAttribute("class", "ezoic-recommended-page-domain");
            site.innerText = page.Domain;

            var txtContent = document.createElement("div");
            txtContent.setAttribute("class", "ezoic-recommended-page-text");
            txtContent.appendChild(titleEl);
            txtContent.appendChild(site);
            pageEl.appendChild(txtContent);

            mainCnt.appendChild(pageEl);
        }

        if (opts.imgsShown === false) {
            mainCnt.classList.add("ezoic-recommended-no-images");
        }

        mainCnt.setAttribute("style", "height: " + (opts.imgsShown === false ? 146 : 232) + "px");

        headerEl = document.createElement("h4");
        headerEl.setAttribute("class", "ezoic-recommended-header");
        headerEl.innerText = opts.title;

        var content = document.createElement("div");
        content.setAttribute("id", "ezoic-recommended");
        content.setAttribute("class", "ezoic-recommended-tall");
        content.appendChild(headerEl);
        content.appendChild(mainCnt);
        return content;
    }

    function showSidebarWidget(pages, showImages) {
        var mainCnt = document.createElement("div");
        mainCnt.setAttribute("class", "ezoic-recommended-pages");

        for (var i = 0; i < pages.length; i++) {
            var page = pages[i];

            var pageEl = document.createElement("a");
            pageEl.setAttribute("class", "ezoic-recommended-page");
            pageEl.setAttribute("href", page.URL);
            __ez.evt.add(pageEl, 'click', function() { // add a cookie onclick to track recommended page visit data
                var expires = new Date();
                expires.setTime(expires.getTime() + (30 * 60 * 1000)); // set cookie to expire 30 minutes from now
                var domain = window.location.host.replace("www", "");
                if (domain[0] !== ".") { // all cookie domains should have a dot in front ex. .brighthubengineering.com
                    domain = "." + domain;
                }
                document.cookie = "ez_recommended_pages=true; expires=" + expires.toUTCString() + "; domain=" + domain + "; path=/";
            });
            if (opts.theme === "dark") pageEl.classList.add("ezoic-recommended-dark");

            var pageCntLeft = document.createElement("div");
            pageCntLeft.setAttribute("class", "ezoic-recommended-page-left");
            pageEl.appendChild(pageCntLeft);

            var pageCntRight = document.createElement("div");
            pageCntRight.setAttribute("class", "ezoic-recommended-page-right");
            pageEl.appendChild(pageCntRight);

            if (page.Image && showImages === true) {
                var imgEl = document.createElement("div");
                imgEl.setAttribute("class", "ezoic-recommended-page-img");
                imgEl.setAttribute("style", "background-image:url(" + page.Image + ")");
                pageCntLeft.appendChild(imgEl);
                opts.imgsShown = true;
            }

            var title = document.createElement("div");
            title.setAttribute("class", "ezoic-recommended-page-title");
            title.innerHTML = page.Title;

            var site = document.createElement("div");
            site.setAttribute("class", "ezoic-recommended-page-domain");
            site.innerText = page.Domain;

            var txtContent = document.createElement("div");
            txtContent.setAttribute("class", "ezoic-recommended-page-text");
            txtContent.appendChild(title);
            txtContent.appendChild(site);
            pageCntRight.appendChild(txtContent);

            mainCnt.appendChild(pageEl);
        }

        if (opts.imgsShown === false) {
            mainCnt.classList.add("ezoic-recommended-no-images");
        }

        headerEl = document.createElement("h4");
        headerEl.setAttribute("class", "ezoic-recommended-header");
        headerEl.innerText = opts.title;

        var content = document.createElement("div");
        content.setAttribute("id", "ezoic-recommended");
        content.setAttribute("class", "ezoic-recommended-sidebar");
        content.appendChild(headerEl);
        content.appendChild(mainCnt);
        return content;
    }

    init();
})(__ez_rp_opts);