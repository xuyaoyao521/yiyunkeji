//====================  new object =====================//
DiscuzCloud = new Object();
//====================  jsonp code =====================//
DiscuzCloud.JSONP = (function () {
    var counter = 0,
        head, query, key, window = this;

    function load(url) {
        script = document.createElement('script'),
        done = false;
        script.src = url;
        script.charset = 'UTF-8';
        script.async = true;

        script.onload = script.onreadystatechange = function () {
            if (!done && (!this.readyState || this.readyState === "loaded" || this.readyState === "complete")) {
                done = true;
                script.onload = script.onreadystatechange = null;
                if (script && script.parentNode) {
                    script.parentNode.removeChild(script);
                }
            }
        };
        if (!head) {
            head = document.getElementsByTagName('head')[0];
        }
        head.appendChild(script);
    }

    function jsonp(url, params, callback) {
        if (url.indexOf('?') > -1) {
            query = '&';
        } else {
            query = '?';
        }

        params = params || {};
        for (key in params) {
            if (params.hasOwnProperty(key)) {
                query += encodeURIComponent(key) + "=" + encodeURIComponent(params[key]) + "&";
            }
        }

        // 固定回调函数的名称
        var jsonp = 'discuzDoctorCallback';
        window[jsonp] = function (data) {
            callback(data);
            try {
                delete window[jsonp];
            } catch (e) {}
            window[jsonp] = null;
        };

        load(url + query + "callback=" + jsonp);

        return jsonp;
    }
    return {
        get: jsonp
    };
}());

//===================  $ code =====================//
DiscuzCloud.$ = function(id) {
    return document.getElementById(id);
}
//===================  main code =====================//
// 主入口函数
DiscuzCloud.doctor = function() {
    this.url = 'http://cp.discuz.qq.com/cloud/doctor?rand=' + Math.random();
    this.params = {'s_url': discuzUrl, 'charset': discuzCharset, 'productVersion': productVersion, 'position': checkPosition, 'discuz_time': discuzTime};
    var callback = function(data) {
        if (typeof(data.errorCode) != 'undefined' && data.errorCode != 0) {
            return false;
        }
        if (typeof(data.result.apiIp) != 'undefined' && checkPosition == 'doctor') {
            eval('DiscuzCloud.' + data.result.apiIp);
        }
        if (typeof(data.result.siteTest) != 'undefined') {
            eval('DiscuzCloud.' + data.result.siteTest);
        }
        if (typeof(data.result.timeCheck) != 'undefined') {
            eval('DiscuzCloud.' + data.result.timeCheck);
        }
    }

    DiscuzCloud.JSONP.get(this.url, this.params, callback);
};
// 测试站点连通性回调
DiscuzCloud.siteTestApiCallback = function(returnInfo, siteTestPosition) {
    // showMessage默认值为 true
    if (typeof siteTestPosition == 'undefined') {
        var siteTestPosition = 'doctor';
    }

    if (!this.$('cloud_doctor_site_test_result_div')) {
        return false;
    }

    if (typeof returnInfo == 'undefined' || !returnInfo) {
        this.$('cloud_doctor_site_test_result_div').innerHTML = '<img align="absmiddle" src="static/image/admincp/cloud/wrong.gif" /> 服务器繁忙，请稍后再试';
        return false;
    }

    if (returnInfo.errorCode) {
        var errorCode = parseInt(returnInfo.errorCode);
        var errorMessage = returnInfo.errorMessage;
        this.$('cloud_doctor_site_test_result_div').innerHTML = '<img align="absmiddle" src="static/image/admincp/cloud/wrong.gif" /> ' + errorMessage;
        return false;
    }

    this.$('cloud_doctor_site_test_result_div').innerHTML = '<img align="absmiddle" src="static/image/admincp/cloud/right.gif" /> 测试成功，耗时 ' + returnInfo.result.timeUsed + ' 秒';
    if (siteTestPosition == 'open') {
        this.$('submit_submit').style.color = '#000';
        this.$('submit_submit').disabled = false;
    }

    return true;
}
// 点击测试其他IP连通性显示
DiscuzCloud.ajaxShowAPIStatus = function(apiType, ips) {
    var apiType = parseInt(apiType);

    for(i in ips) {
        var apiIp = ips[i].ip;
        var apiDescription = ips[i].description;
        var apiTr = document.createElement('tr');

        var apiTdFirst = document.createElement('td');
        apiTdFirst.className = 'td24';
        if (!apiType || apiType == 1) {
            apiTdFirst.innerHTML = '<strong>云平台其他接口测试</strong>';
        } else if (apiType == 2) {
            apiTdFirst.innerHTML = '<strong>漫游其他接口测试</strong>';
        } else if (apiType == 3) {
            apiTdFirst.innerHTML = '<strong>QQ互联接口测试</strong>';
        }

        var apiTdSecond = document.createElement('td');
        apiTdSecond.innerHTML = '<div id="_doctor_apitest_' + apiType + '_' + apiIp + '">&nbsp;</div>';

        apiTr.appendChild(apiTdFirst);
        apiTr.appendChild(apiTdSecond);

        if (!apiType || apiType == 1) {
            this.$('cloud_tbody_api_test').appendChild(apiTr);
        } else if (apiType == 2) {
            this.$('cloud_tbody_manyou_test').appendChild(apiTr);
        } else if (apiType == 3) {
            this.$('cloud_tbody_qzone_test').appendChild(apiTr);
        }
    }

    for(i in ips) {
        var apiIp = ips[i].ip;
        var apiDescription = ips[i].description;
        ajaxget('eyun_admins.php?action=cloud&operation=doctor&op=apitest&api_type=' + apiType + '&api_ip=' + encodeURI(apiIp) + '&api_description=' + encodeURI(apiDescription), '_doctor_apitest_' + apiType + '_' + apiIp);
    }
}
// 获取站点IP回调
DiscuzCloud.apiCallback = function(apiIps) {
    if (typeof apiIps == 'undefined' || typeof apiIps == 'null' || !apiIps) {
        return false;
    }

    if (apiIps.errorCode) {
        return false;
    }

    if (!apiIps.result || !apiIps.result.cloud_api_ip || !apiIps.result.manyou_api_ip || !apiIps.result.qzone_api_ip) {
        return false;
    }

    if (!this.$('cloud_tbody_api_test') || !this.$('cloud_tbody_manyou_test') || !this.$('cloud_tbody_qzone_test')) {
        return false;
    }

    var cloudAPIIPs = apiIps.result.cloud_api_ip;
    var manyouAPIIPs = apiIps.result.manyou_api_ip;
    var QzoneAPIIPs = apiIps.result.qzone_api_ip;

    // 云平台接口IP测试
    this.ajaxShowAPIStatus(1, cloudAPIIPs);

    // 漫游接口IP测试
    this.ajaxShowAPIStatus(2, manyouAPIIPs);

    // Qzone接口IP测试
    this.ajaxShowAPIStatus(3, QzoneAPIIPs);
}
// 时间检测回调
DiscuzCloud.timeCheckCallback = function(timeInfo) {
    if (!this.$('cloud_time_check')) {
        return false;
    }
    if (timeInfo.errorCode) {
        errorMessage = timeInfo.errorMessage;
        this.$('cloud_time_check').innerHTML = '<img align="absmiddle" src="static/image/admincp/cloud/wrong.gif" /> ' + errorMessage;
        return false;
    } else {
        this.$('cloud_time_check').innerHTML = '<img align="absmiddle" src="static/image/admincp/cloud/right.gif" /> 正常';
        return true;
    }
}
// 开通云平台表单
DiscuzCloud.submitForm = function() {

    if (dialogHtml == '') {
        dialogHtml = this.$('siteInfo').innerHTML;
        this.$('siteInfo').innerHTML = '';
    }

    showWindow('open_cloud', dialogHtml, 'html');

    this.$('fwin_open_cloud').style.top = '80px';
    this.$('cloud_api_ip').value = cloudApiIp;

    return false;
}
// 开通流程向导
DiscuzCloud.dealHandle = function(msg) {

    getMsg = true;

    if (msg['status'] == 'error') {
        this.$('loadinginner').innerHTML = '<font color="red">' + msg['content'] + '</font>';
        return;
    }

    this.$('loading').style.display = 'none';
    this.$('mainArea').style.display = '';

    if(cloudStatus == 'upgrade') {
        this.$('title').innerHTML = msg['cloudIntroduction']['upgrade_title'];
        this.$('msg').innerHTML = msg['cloudIntroduction']['upgrade_content'];
    } else {
        this.$('title').innerHTML = msg['cloudIntroduction']['open_title'];
        this.$('msg').innerHTML = msg['cloudIntroduction']['open_content'];
    }

    if (msg['navSteps']) {
        this.$('nav_steps').innerHTML = msg['navSteps'];
    }

    if (msg['protocalUrl']) {
        this.$('protocal_url').href = msg['protocalUrl'];
    }

    if (msg['cloudApiIp']) {
        cloudApiIp = msg['cloudApiIp'];
    }

    if (msg['manyouUpdateTips']) {
        this.$('manyou_update_tips').innerHTML = msg['manyouUpdateTips'];
    }
}

DiscuzCloud.expiration = function() {
    if(!getMsg) {
        this.$('loadinginner').innerHTML = '<font color="red">' + expirationText + '</font>';
        clearTimeout(expirationTimeout);
    }
}

window.onload = function(e) {
    DiscuzCloud.doctor();
}
