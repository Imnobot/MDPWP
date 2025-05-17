jQuery(document).ready(function (_0x4a3a32) {
  'use strict';

  var _0x1294db = _0x4a3a32("#mvp-loader");
  var _0x27bc83 = _0x4a3a32("body");
  var _0x349436 = _0x4a3a32(document);
  var _0x571282 = _0x4a3a32("#mvp-translate");
  var _0x3b8869 = _0x4a3a32(".mvp-admin");
  var _0x3aeef0 = _0x4a3a32("#mvp-form-global-settings");
  _0x3aeef0.keydown(function (_0x2bd634) {
    if (_0x2bd634.keyCode == 0xd) {
      _0x2bd634.preventDefault();
      return false;
    }
  });
  var _0x327c40;
  if (document.getElementById("mvp_global_custom_css_field")) {
    _0x327c40 = CodeMirror.fromTextArea(document.getElementById("mvp_global_custom_css_field"), {
      'lineNumbers': true,
      'mode': "css",
      'lineWrapping': true
    });
  }
  var _0x3abd88;
  _0x4a3a32("#mvp-edit-global-options-submit").on("click", function () {
    if (_0x3abd88) {
      return false;
    }
    _0x3abd88 = true;
    _0x1294db.show();
    var _0x3af074 = {};
    _0x4a3a32.each(_0x3aeef0.serializeArray(), function (_0x5b74a6, _0x1572d4) {
      if (_0x1572d4.name != "mvp_global_custom_css_field") {
        _0x3af074[_0x1572d4.name] = _0x1572d4.value;
      }
    });
    _0x3aeef0.find("input:checkbox:not(:checked)").map(function () {
      _0x3af074[this.name] = '0';
    });
    var _0x4f2c8c = _0x327c40 ? _0x327c40.getValue() : '';
    _0x3af074.global_custom_css = _0x4f2c8c;
    var _0x546aea = [{
      'name': "action",
      'value': "mvp_save_global_options"
    }, {
      'name': 'security',
      'value': mvp_data.security
    }, {
      'name': "options",
      'value': JSON.stringify(_0x3af074)
    }];
    console.log(_0x546aea);
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0x546aea,
      'dataType': "json"
    }).done(function (_0x30ff72) {
      console.log(_0x30ff72);
      _0x3abd88 = false;
      _0x1294db.hide();
    }).fail(function (_0x48eb98, _0x87f27a, _0x3c15b2) {
      console.log(_0x48eb98.responseText, _0x87f27a, _0x3c15b2);
      _0x3abd88 = false;
      _0x1294db.hide();
    });
    return false;
  });
  var _0xcb20fa;
  _0x4a3a32(".mvp-clear-watched-percentage-all").on("click", function () {
    var _0x480d80 = confirm("Are you sure you want to clear?");
    if (_0x480d80) {
      if (_0xcb20fa) {
        return false;
      }
      _0xcb20fa = true;
      _0x1294db.show();
      var _0x269585 = [{
        'name': "action",
        'value': "mvp_clear_watched_percentage_all"
      }, {
        'name': "security",
        'value': mvp_data.security
      }];
      _0x4a3a32.ajax({
        'url': mvp_data.ajax_url,
        'type': 'post',
        'data': _0x269585,
        'dataType': 'json'
      }).done(function (_0x52ddba) {
        _0x1294db.hide();
        _0xcb20fa = false;
      }).fail(function (_0xce843e, _0x4da3d4, _0x9386c3) {
        console.log(_0xce843e.responseText, _0x4da3d4, _0x9386c3);
        _0x1294db.hide();
        _0xcb20fa = false;
      });
    }
  });
  _0x3b8869.on('click', ".option-toggle", function (_0x5548bc) {
    var _0x1acb40 = _0x4a3a32(this).closest(".option-tab");
    if (_0x1acb40.hasClass('option-closed')) {
      _0x1acb40.removeClass("option-closed");
    } else {
      _0x1acb40.addClass("option-closed");
    }
  });
  _0x349436.on("click", ".mvp-modal-size-btn", function () {
    var _0x2326f8 = _0x4a3a32(this);
    var _0x4eeb74 = _0x2326f8.closest(".mvp-modal");
    if (_0x4eeb74.hasClass("mvp-modal-full")) {
      _0x4eeb74.removeClass("mvp-modal-full");
      _0x2326f8.find(".mvp-modal-expand").show();
      _0x2326f8.find(".mvp-modal-collapse").hide();
    } else {
      _0x4eeb74.addClass("mvp-modal-full");
      _0x2326f8.find(".mvp-modal-expand").hide();
      _0x2326f8.find(".mvp-modal-collapse").show();
    }
  });
  _0x3b8869.on("hover", 'input[type=text]', function () {
    _0x4a3a32(this).attr("title", _0x4a3a32(this).val());
  });
  _0x3b8869.on("hover", "textarea", function () {
    _0x4a3a32(this).attr('title', _0x4a3a32(this).text());
  });
  _0x3b8869.on("hover", 'select', function () {
    _0x4a3a32(this).attr("title", _0x4a3a32(this).find(":selected").text());
  });
  _0x4a3a32(".mvp-table .title-editable").on('blur', function () {
    var _0x29cc16 = _0x4a3a32(this);
    var _0x71dbce = _0x29cc16.val();
    if (_0x71dbce == '') {
      _0x29cc16.val(_0x29cc16.attr("data-title"));
      alert("Title cannot be empty!");
      return false;
    }
    if (_0x29cc16.attr("data-player-id") !== undefined) {
      var _0xc7a525 = [{
        'name': 'action',
        'value': "mvp_edit_player_title"
      }, {
        'name': "title",
        'value': _0x71dbce
      }, {
        'name': 'id',
        'value': _0x29cc16.attr("data-player-id")
      }, {
        'name': 'security',
        'value': mvp_data.security
      }];
    } else {
      if (_0x29cc16.attr("data-playlist-id") !== undefined) {
        var _0xc7a525 = [{
          'name': "action",
          'value': "mvp_edit_playlist_title"
        }, {
          'name': "title",
          'value': _0x71dbce
        }, {
          'name': 'id',
          'value': _0x29cc16.attr("data-playlist-id")
        }, {
          'name': "security",
          'value': mvp_data.security
        }];
      } else {
        if (_0x29cc16.attr("data-ad-id") !== undefined) {
          var _0xc7a525 = [{
            'name': "action",
            'value': "mvp_edit_ad_title"
          }, {
            'name': "title",
            'value': _0x71dbce
          }, {
            'name': 'id',
            'value': _0x29cc16.attr("data-ad-id")
          }, {
            'name': "security",
            'value': mvp_data.security
          }];
        }
      }
    }
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0xc7a525,
      'dataType': 'json'
    }).fail(function (_0x1efabd, _0x26a3e5, _0x19705b) {
      console.log(_0x1efabd, _0x26a3e5, _0x19705b);
    });
  });
  function _0x9e5130() {
    if (window.innerHeight + window.scrollY >= document.body.scrollHeight - 0x32) {
      _0x4a3a32('#mvp-sticky-action').removeClass("mvp-sticky");
      _0x4a3a32("#mvp-save-holder").hide();
    } else {
      _0x4a3a32("#mvp-sticky-action").addClass("mvp-sticky");
      _0x4a3a32("#mvp-save-holder").show();
    }
  }
  _0x4a3a32(window).scroll(function () {
    _0x9e5130();
  });
  _0x4a3a32(window).resize(function () {
    _0x9e5130();
  });
  _0x9e5130();
  _0x4a3a32("#mvp-players-order").one("click", function () {
    var _0x4fc9ff = _0x4a3a32("#mvp-players-order-by").val();
    window.location.href = _0x4fc9ff;
  });
  var _0x1c282e = _0x4a3a32("#playlistScrollType").on("change", function () {
    var _0x4df134 = _0x4a3a32(this).val();
    if (_0x4df134 == "mcustomscrollbar") {
      _0x4a3a32("#playlistScrollTheme-field").show();
    } else if (_0x4df134 == "perfect-scrollbar") {
      _0x4a3a32("#playlistScrollTheme-field").hide();
    }
  });
  _0x1c282e.change();
  var _0x30f270 = _0x4a3a32("#mvp-keyboard-controls-field");
  var _0x31011b = _0x4a3a32("#mvp-keyboard-controls-field-inner");
  if (typeof mvp_allKeyboardControls_arr !== "undefined") {
    var _0x4d823e;
    var _0xa11b1b = mvp_allKeyboardControls_arr.length;
    var _0xf98e15;
    if (_0xa11b1b > 0x0) {
      for (_0x4d823e = 0x0; _0x4d823e < _0xa11b1b; _0x4d823e++) {
        _0xf98e15 = mvp_allKeyboardControls_arr[_0x4d823e];
        var _0x43c451 = _0x4a3a32(".mvp-value-table-wrap-orig").clone().removeClass('mvp-value-table-wrap-orig').addClass('mvp-value-table-wrap').appendTo(_0x31011b);
        _0x43c451.find('.mvp-keyboard-key').val(_0xf98e15.key);
        _0x43c451.find(".mvp-keyboard-action-display").val(_0xf98e15.action_display);
        _0x43c451.find(".mvp-keyboard-keycode").val(_0xf98e15.keycode);
        _0x43c451.find(".mvp-keyboard-action").val(_0xf98e15.action);
        if (mvp_keyboardControls_arr.length && mvp_keyboardControls_arr[0x0].action == _0xf98e15.action) {
          mvp_keyboardControls_arr.shift();
        } else {
          _0x43c451.addClass("mvp-value-table-wrap-disabled");
        }
      }
    }
  }
  _0x30f270.find('.mvp-keyboard-key-enter').on('keyup', function (_0x6aadbf) {
    var _0x3f87aa = _0x6aadbf.keyCode;
    if (_0x3f87aa == '8' || _0x3f87aa == '46') {
      return false;
    }
    var _0x590e68 = _0x34a3d3();
    if (_0x590e68.indexOf(_0x3f87aa) > -0x1) {
      alert(_0x571282.attr("data-enter-number"));
      return false;
    }
    _0x4a3a32(this).closest('.mvp-value-table-wrap').find(".mvp-keyboard-keycode").val(_0x6aadbf.keyCode);
    _0x4a3a32(this).closest(".mvp-value-table-wrap").find(".mvp-keyboard-key").val(_0x1125b9[_0x6aadbf.keyCode]);
  });
  _0x30f270.on("click", ".keyboard-controls-toggle", function () {
    var _0x1efef7 = _0x4a3a32(this).closest('.mvp-value-table-wrap');
    if (_0x1efef7.hasClass("mvp-value-table-wrap-disabled")) {
      _0x1efef7.removeClass("mvp-value-table-wrap-disabled");
    } else {
      _0x1efef7.addClass("mvp-value-table-wrap-disabled");
    }
  });
  _0x4a3a32(".mvp-checkbox").spectrum({
    'color': _0x4a3a32(this).val(),
    'showAlpha': true,
    'chooseText': "Update",
    'showInitial': true,
    'showInput': true,
    'preferredFormat': "hex",
    'change': function (_0x3dfc0c) {
      _0x4a3a32(this).val(_0x3dfc0c.toRgbString());
    }
  });
  var _0x2a0685;
  if (document.getElementById("mvp_custom_css_field")) {
    _0x2a0685 = CodeMirror.fromTextArea(document.getElementById("mvp_custom_css_field"), {
      'lineNumbers': true,
      'mode': 'css',
      'lineWrapping': true
    });
  }
  var _0x1fe71a;
  if (document.getElementById('mvp_custom_js_field')) {
    _0x1fe71a = CodeMirror.fromTextArea(document.getElementById('mvp_custom_js_field'), {
      'lineNumbers': true,
      'mode': 'js',
      'lineWrapping': true
    });
  }
  var _0x3e781b;
  var _0x1c38af;
  var _0x31a663;
  function _0x55fdad() {
    _0x3e781b = true;
    if (document.getElementById("media_end_action_html")) {
      _0x1c38af = CodeMirror.fromTextArea(document.getElementById("media_end_action_html"), {
        'lineNumbers': true,
        'mode': 'js',
        'lineWrapping': true
      });
    }
    if (document.getElementById("media_end_action_css")) {
      _0x31a663 = CodeMirror.fromTextArea(document.getElementById("media_end_action_css"), {
        'lineNumbers': true,
        'mode': "css",
        'lineWrapping': true
      });
    }
    _0x4a3a32("#mediaEndAction").on("change", function () {
      if (_0x4a3a32(this).val() == "custom") {
        _0x4a3a32("#mvp-media-end-action-custom-wrap").show();
      } else {
        _0x4a3a32("#mvp-media-end-action-custom-wrap").hide();
      }
    }).change();
  }
  _0x4a3a32("#mediaEndAction").on('change', function () {
    if (_0x4a3a32(this).val() == "image") {
      _0x4a3a32("#mvp-media-end-action-image-wrap").show();
    } else {
      _0x4a3a32("#mvp-media-end-action-image-wrap").hide();
    }
  }).change();
  _0x4a3a32("#mvp-player-preset").change(function () {
    var _0x232851 = _0x4a3a32(this).val();
    var _0x820252 = mvp_data.plugins_url + "/assets/presets/" + _0x232851 + ".jpg";
    _0x4a3a32("#preset-preview").attr('src', _0x820252);
    _0x4a3a32(".mvp-player-info").hide();
    _0x4a3a32(".player-info-" + _0x232851).show();
  }).change();
  var _0x3b0079 = _0x4a3a32("#mvp-edit-player-form");
  var _0x5a065f;
  var _0x24394f;
  if (_0x3b0079.attr("data-preset") != undefined) {
    _0x24394f = _0x3b0079.attr("data-preset");
    if (_0x24394f.indexOf('grid1') > -0x1) {
      _0x4a3a32('.useMasonry_field').show();
      _0x4a3a32("#mvp-tab-css-scroll-content").addClass("mvp-force-hide");
      _0x4a3a32("#mvp-tab-css-scroll").addClass('mvp-force-hide');
    } else {
      _0x4a3a32(".useMasonry_field").hide();
    }
    if (_0x24394f.indexOf("list") > -0x1) {
      _0x4a3a32(".totalScrollAction_field").show();
      _0x4a3a32("#mvp-tab-css-loadmore-content").addClass("mvp-force-hide");
      _0x4a3a32("#mvp-tab-css-loadmore").addClass("mvp-force-hide");
      _0x4a3a32("#mvp-tab-translation-pagination").addClass("mvp-force-hide");
      _0x4a3a32("#mvp-tab-translation-pagination-content").addClass("mvp-force-hide");
    } else {
      _0x4a3a32(".totalScrollAction_field").hide();
    }
  }
  _0x4a3a32("#includePlaylistsIntoSelector").on("change", function () {
    var _0x40cd92 = _0x4a3a32(this).val();
    if (_0x40cd92 == "all") {
      _0x4a3a32("#playlist-selector-field").hide();
    } else {
      _0x4a3a32("#playlist-selector-field").show();
    }
  }).change();
  var _0x20a5e2 = _0x4a3a32("#mvp-playlist-selector-selected");
  if (typeof _0x4a3a32.fn.select2 !== "undefined") {
    var _0x5d8463 = _0x4a3a32('#playlist-selector-playlist-list').select2({
      'placeholder': _0x571282.attr("data-select-playlists")
    }).on("change", function (_0x31eb5c) {
      console.log(_0x5d8463.val());
      _0x20a5e2.val(_0x5d8463.val());
    });
    if (_0x20a5e2.val()) {
      var _0x2ad6af = _0x20a5e2.val().split(',');
      _0x5d8463.val(_0x2ad6af).trigger("change");
    }
    _0x4a3a32('#mvp-playlist-selector-clear-selected').on("click", function () {
      _0x4a3a32("#playlist-selector-playlist-list").val('').trigger("change");
    });
    _0x4a3a32('#mvp-playlist-selector-select-all').on("click", function () {
      _0x4a3a32("#playlist-selector-playlist-list").find("option").prop('selected', true).trigger("change");
    });
  }
  _0x4a3a32('#clear_playback_position').on("click", function () {
    var _0x2e3c4d = confirm(_0x571282.attr('data-sure-to-clear'));
    if (_0x2e3c4d) {
      var _0x399dd1 = "localStorage" in window && window.localStorage !== null;
      if (_0x399dd1) {
        _0x399dd1.removeItem("mvp-playback-position-");
      }
    }
  });
  _0x4a3a32("#mvp-edit-player-form-submit").on('click', function () {
    if (_0x5a065f) {
      return false;
    }
    _0x5a065f = true;
    var _0x3b3df2;
    var _0x4b7ce8 = _0x4a3a32("#playerType").val();
    if (_0x4b7ce8 == 'lightbox') {
      var _0x172b18 = _0x4a3a32('#selectorInit').val();
      if (_0x172b18.replace(/^\s+|\s+$/g, '').length == 0x0) {
        _0x4a3a32("#selectorInit").addClass("aprf");
        _0x3b3df2 = true;
      }
    }
    if (_0x3b3df2) {
      _0x4a3a32("#mvp-tab-layout").click();
      _0x3b0079.find(".option-tab.mvp-player-style").removeClass('option-closed');
      _0x4a3a32('html,body').animate({
        'scrollTop': _0x4a3a32("#selectorInit_field").offset().top
      });
      _0x5a065f = false;
      alert(_0x571282.attr("data-player-type-lightbox-needs-dom"));
      return false;
    }
    _0x4a3a32("#mvp-tab-playback-content").find("input[required]").each(function () {
      var _0x2b2e20 = _0x4a3a32(this);
      if (_0x2b2e20.val() == '') {
        _0x2b2e20.addClass('aprf');
        _0x3b3df2 = true;
      }
    });
    if (_0x3b3df2) {
      _0x4a3a32("#mvp-tab-playback").click();
      _0x3b0079.find(".option-tab.mvp-player-general").removeClass("option-closed");
      _0x4a3a32('html,body').animate({
        'scrollTop': _0x51b896.offset().top
      });
      _0x5a065f = false;
      alert(_0x571282.attr('data-fill-required-fields'));
      return false;
    }
    var _0x5e390a = _0x4a3a32("#breakPoints_field");
    var _0x3b3df2;
    _0x5e390a.find('input[required]').each(function () {
      var _0x527090 = _0x4a3a32(this);
      if (_0x527090.val() == '') {
        _0x527090.addClass('aprf');
        _0x3b3df2 = true;
      }
    });
    if (_0x3b3df2) {
      _0x4a3a32('#mvp-tab-layout').click();
      _0x3b0079.find('.option-tab.mvp-player-style').removeClass('option-closed');
      _0x4a3a32('html,body').animate({
        'scrollTop': _0x5e390a.offset().top
      });
      _0x5a065f = false;
      alert(_0x571282.attr("data-fill-required-fields"));
      return false;
    }
    var _0x3b3df2;
    var _0x6db904;
    _0x5ceb93.find(".ev_width").each(function () {
      var _0x213eaf = _0x4a3a32(this);
      if (_0x213eaf.val() == '') {
        _0x213eaf.addClass("aprf");
        _0x213eaf.closest(".option-tab.ev-unit-wrap").removeClass('option-closed');
        if (!_0x6db904) {
          _0x6db904 = _0x213eaf;
        }
        _0x3b3df2 = true;
      }
    });
    if (_0x3b3df2) {
      var _0x10871c = _0x3b0079.find(".option-tab.mvp-player-style");
      _0x10871c.removeClass("option-closed");
      _0x4a3a32('html,body').animate({
        'scrollTop': _0x10871c.offset().top
      });
      _0x4a3a32("#mvp-tab-ev").click();
      _0x5a065f = false;
      alert(_0x571282.attr("data-fill-required-fields"));
      return false;
    }
    var _0x59f374 = _0x4a3a32("#caption_breakPoints_field");
    var _0x3b3df2;
    _0x59f374.find("input[required]").each(function () {
      var _0x107205 = _0x4a3a32(this);
      if (_0x107205.val() == '') {
        _0x107205.addClass("aprf");
        _0x3b3df2 = true;
      }
    });
    if (_0x3b3df2) {
      _0x4a3a32("#mvp-tab-caption").click();
      _0x3b0079.find('.option-tab.mvp-player-general').removeClass("option-closed");
      _0x4a3a32('html,body').animate({
        'scrollTop': _0x59f374.offset().top
      });
      _0x5a065f = false;
      alert(_0x571282.attr("data-fill-required-fields"));
      return false;
    }
    var _0x591499 = _0x4a3a32('#playbackRate_field');
    var _0x3b3df2;
    _0x591499.find("input[required]").each(function () {
      var _0x5412c2 = _0x4a3a32(this);
      if (_0x5412c2.val() == '') {
        _0x5412c2.addClass("aprf");
        _0x3b3df2 = true;
      }
    });
    if (_0x3b3df2) {
      _0x4a3a32("#mvp-tab-playbackRate").click();
      _0x3b0079.find(".option-tab.mvp-player-general").removeClass("option-closed");
      _0x4a3a32("html,body").animate({
        'scrollTop': _0x591499.offset().top
      });
      _0x5a065f = false;
      alert(_0x571282.attr("data-fill-required-fields"));
      return false;
    }
    _0x1294db.show();
    var _0x41f0f3 = {};
    _0x4a3a32.each(_0x3b0079.serializeArray(), function (_0x2fe2e2, _0x3db4e5) {
      if (_0x3db4e5.name != "mvp_custom_css_field" && _0x3db4e5.name != "mvp_custom_js_field" && _0x3db4e5.name != 'media_end_action_html' && _0x3db4e5.name != "media_end_action_css" && _0x3db4e5.name != "playlistItemContent[]" && _0x3db4e5.name != 'downloadVideoUserRoles[]' && _0x3db4e5.name != "viewVideoWithoutAdsUserRoles[]" && _0x3db4e5.name != "playbackRate_value[]" && _0x3db4e5.name != "playbackRate_menu_title[]" && _0x3db4e5.name != "caption_bp_width[]" && _0x3db4e5.name != 'caption_bp_font_size[]' && _0x3db4e5.name != "bp_width[]" && _0x3db4e5.name != 'bp_column[]' && _0x3db4e5.name != 'bp_gutter[]' && _0x3db4e5.name.indexOf("ev[") == -0x1) {
        _0x41f0f3[_0x3db4e5.name] = _0x3db4e5.value;
      }
    });
    var _0x228462 = _0x1c38af ? _0x1c38af.getValue() : '';
    var _0x3377c7 = _0x31a663 ? _0x31a663.getValue() : '';
    _0x41f0f3.media_end_action_html = _0x228462;
    _0x41f0f3.media_end_action_css = _0x3377c7;
    var _0x36795a = [];
    _0x4a3a32("#playlistItemContent-field").find("input:checkbox:checked").each(function () {
      _0x36795a.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.playlistItemContent = _0x36795a;
    var _0x1c281b = [];
    _0x4a3a32("#downloadVideoUserRoles-field").find("input:checkbox:checked").each(function () {
      _0x1c281b.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.downloadVideoUserRoles = _0x1c281b;
    var _0x2d05db = [];
    _0x4a3a32("#viewVideoWithoutAdsUserRoles-field").find("input:checkbox:checked").each(function () {
      _0x2d05db.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.viewVideoWithoutAdsUserRoles = _0x2d05db;
    var _0x479496 = [];
    _0x4a3a32("#mvp-playbackRate-br-table-wrap").find(".playbackRate-value").each(function () {
      _0x479496.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.playbackRate_value = _0x479496;
    var _0x4cf367 = [];
    _0x4a3a32("#mvp-playbackRate-br-table-wrap").find(".playbackRate-menu-title").each(function () {
      _0x4cf367.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.playbackRate_menu_title = _0x4cf367;
    var _0x571473 = [];
    _0x4a3a32("#mvp-caption-br-table-wrap").find('.caption-bp-width').each(function () {
      _0x571473.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.caption_bp_width = _0x571473;
    var _0xed4665 = [];
    _0x4a3a32('#mvp-caption-br-table-wrap').find(".caption-bp-font-size").each(function () {
      _0xed4665.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.caption_bp_font_size = _0xed4665;
    var _0xbcbd6e = [];
    _0x4a3a32("#mvp-br-table-wrap").find(".bp-width").each(function () {
      _0xbcbd6e.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.bp_width = _0xbcbd6e;
    var _0xf42eb1 = [];
    _0x4a3a32("#mvp-br-table-wrap").find(".bp-column").each(function () {
      _0xf42eb1.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.bp_column = _0xf42eb1;
    var _0x1b8297 = [];
    _0x4a3a32("#mvp-br-table-wrap").find(".bp-gutter").each(function () {
      _0x1b8297.push(_0x4a3a32(this).val());
    });
    _0x41f0f3.bp_gutter = _0x1b8297;
    var _0x3acda1 = [];
    _0x4a3a32('#mvp-ev-wrap').find(".ev-unit-wrap").each(function () {
      var _0x357583 = _0x4a3a32(this);
      var _0x805fb6 = {};
      var _0x374a77 = _0x357583.find('.ev_width').val();
      _0x805fb6.width = _0x374a77;
      _0x357583.find("input:checkbox:checked").each(function () {
        _0x805fb6[_0x4a3a32(this).attr("data-cname")] = 'on';
      });
      _0x3acda1.push(_0x805fb6);
    });
    _0x41f0f3.ev = _0x3acda1;
    var _0x2116d9 = [];
    _0x30f270.find(".mvp-value-table-wrap:not(.mvp-value-table-wrap-disabled)").each(function () {
      var _0x49d30a = _0x4a3a32(this);
      var _0xc48027 = {
        'keycode': _0x49d30a.find(".mvp-keyboard-keycode").val(),
        'action': _0x49d30a.find(".mvp-keyboard-action").val()
      };
      _0x2116d9.push(_0xc48027);
    });
    _0x41f0f3.keyboardControls = _0x2116d9;
    console.log(_0x41f0f3);
    _0x41f0f3.breakpoints_set = '1';
    _0x41f0f3.playbackrate_set = '1';
    var _0x28c2a3 = _0x2a0685 ? _0x2a0685.getValue() : '';
    var _0x44559a = _0x1fe71a ? _0x1fe71a.getValue() : '';
    var _0x49d858 = [{
      'name': 'action',
      'value': "mvp_save_player_options"
    }, {
      'name': 'player_id',
      'value': _0x3b0079.attr('data-player-id')
    }, {
      'name': "player_options",
      'value': JSON.stringify(_0x41f0f3)
    }, {
      'name': "custom_css",
      'value': _0x28c2a3
    }, {
      'name': "custom_js",
      'value': _0x44559a
    }, {
      'name': 'security',
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0x49d858,
      'dataType': "json"
    }).done(function (_0x5a29e2) {
      _0x1294db.hide();
      _0x5a065f = false;
    }).fail(function (_0x46aa9e, _0x5f405e, _0x3c8ab8) {
      console.log(_0x46aa9e.responseText, _0x5f405e, _0x3c8ab8);
      _0x1294db.hide();
      _0x5a065f = false;
    });
    return false;
  });
  var _0x4ea9b6;
  _0x4a3a32("#playlistGridStyle").on("change", function () {
    _0x4ea9b6 = _0x4a3a32(this).val();
    var _0xac3f6b = mvp_data.plugins_url + '/assets/data/playlist_grid_style/' + _0x4ea9b6 + ".png";
    _0x4a3a32('#playlist-grid-style-img').attr('src', _0xac3f6b);
    _0x4a3a32(".playlist-grid-style-info").hide();
    _0x4a3a32('#' + _0x4ea9b6 + "-info").show();
  }).change();
  var _0x3717a0;
  _0x4a3a32('#playlistStyle').on("change", function () {
    _0x3717a0 = _0x4a3a32(this).val();
    var _0x4202ee = mvp_data.plugins_url + "/assets/data/playlist_style/" + _0x3717a0 + ".png";
    _0x4a3a32('#playlist-style-img').attr('src', _0x4202ee);
    _0x4a3a32(".playlist-style-info").hide();
    _0x4a3a32('#' + _0x3717a0 + '-info').show();
  }).change();
  var _0x4f53da;
  _0x4a3a32("#navigationStyle").on("change", function () {
    _0x4f53da = _0x4a3a32(this).val();
    _0x4a3a32(".navigation-style-info").hide();
    _0x4a3a32('#' + _0x4f53da + "-info").show();
  }).change();
  var _0x1b3629 = _0x4a3a32("#gridType").on("change", function () {
    if (_0x4a3a32(this).val() == "javascript") {
      _0x4a3a32('#breakPoints_field').show();
    } else {
      _0x4a3a32("#breakPoints_field").hide();
    }
  });
  var _0x108462;
  _0x4a3a32("#playlistPosition").on("change", function () {
    _0x108462 = _0x4a3a32(this).val();
    var _0x168902 = mvp_data.plugins_url + "/assets/data/playlist_position/" + _0x108462 + ".png";
    _0x4a3a32("#playlist-position-img").attr("src", _0x168902);
    _0x4a3a32('#playlistStyle-field').hide();
    _0x4a3a32("#playlistStyle-field2").hide();
    _0x4a3a32("#playlistGridStyle-field").hide();
    _0x4a3a32("#playlistGridStyle-field2").hide();
    _0x4a3a32("#playlistScrollTheme-field").hide();
    _0x4a3a32("#playlistScrollType-field").hide();
    _0x4a3a32("#navigationType-field").hide();
    _0x4a3a32("#navigationStyle-field").hide();
    _0x4a3a32("#showLoadMore_field").hide();
    _0x4a3a32("#playlistSideWidth_field").hide();
    _0x4a3a32('#playlistBottomHeight_field').hide();
    _0x4a3a32("#useSearchField_field").hide();
    _0x4a3a32("#breakPoints_field").hide();
    _0x4a3a32("#gridType_field").hide();
    _0x4a3a32("#playlistOpened_field").hide();
    _0x4a3a32("#hidePlaylistOnFullscreenEnter_field").hide();
    _0x4a3a32("#wrapperMaxWidth_lightbox_info").hide();
    _0x4a3a32(".verticalBottomSepearator_field").hide();
    _0x4a3a32("#playerShadow_field").hide();
    _0x4a3a32("#playerType_field").hide();
    _0x4a3a32("#combinePlayerRatio_field").hide();
    _0x4a3a32("#usePlaylistToggle-field").show();
    _0x4a3a32(".playlist-show").hide();
    if (_0x108462 == "no-playlist") {
      _0x4a3a32("#playerShadow_field").show();
      _0x4a3a32("#playlistItemContent-field").hide();
      _0x4a3a32("#playerType_field").show();
      _0x4a3a32('#usePlaylistToggle-field').hide();
      _0x4a3a32(".playlist-field").hide();
    } else {
      if (_0x108462 == "outer" || _0x108462 == "wall") {
        _0x4a3a32("#playlistGridStyle-field").show();
        _0x4a3a32("#playlistGridStyle-field2").show();
        _0x4a3a32("#showLoadMore_field").show();
        _0x4a3a32('#gridType_field').show();
        _0x1b3629.change();
        _0x4a3a32("#playlistItemContent-field").show();
        _0x4a3a32("#useSearchField_field").show();
        if (_0x108462 == "outer") {
          _0x4a3a32("#playlistOpened_field").show();
        } else if (_0x108462 == "wall") {
          _0x4a3a32("#wrapperMaxWidth_lightbox_info").show();
        }
      } else {
        _0x4a3a32("#playlistStyle-field").show();
        _0x4a3a32('#playlistStyle-field2').show();
        _0x4a3a32("#navigationType-field").show();
        _0x4a3a32("#playlistOpened_field").show();
        _0x4a3a32("#hidePlaylistOnFullscreenEnter_field").show();
        _0x4a3a32("#playerShadow_field").show();
        _0x4a3a32("#playlistItemContent-field").show();
        _0x4a3a32("#useSearchField_field").show();
        _0x4a3a32("#playerType_field").show();
        if (_0x108462 == 'vrb') {
          _0x4a3a32("#playlistSideWidth_field").show();
          _0x4a3a32("#playlistBottomHeight_field").show();
          _0x4a3a32(".verticalBottomSepearator_field").show();
          _0x4a3a32("#combinePlayerRatio_field").show();
        } else {
          if (_0x108462 == 'vb') {
            _0x4a3a32('#playlistBottomHeight_field').show();
          } else if (_0x108462 == 'ht' || _0x108462 == 'hb') {
            _0x4a3a32("#navigationStyle-field").hide();
          }
        }
      }
    }
    _0x4a3a32(".playlist-position-info").hide();
    _0x4a3a32('#' + _0x108462 + "-info").show();
  }).change();
  _0x4a3a32('#rightClickContextMenu').on("change", function () {
    if (_0x4a3a32(this).val() == "custom") {
      _0x4a3a32(".mvp_customContextMenu").show();
    } else {
      _0x4a3a32(".mvp_customContextMenu").hide();
    }
  }).change();
  _0x4a3a32("#useShare").on("change", function () {
    if (_0x4a3a32(this).val() == '1') {
      _0x4a3a32(".mvp_share").show();
    } else {
      _0x4a3a32(".mvp_share").hide();
    }
  }).change();
  _0x4a3a32("#youtubePlayerType").on("change", function () {
    var _0x37f5c7 = _0x4a3a32(this).val();
    if (_0x37f5c7 == 'default') {
      _0x4a3a32(".youtubePlayerTypeDefault_field").show();
      _0x4a3a32(".youtubePlayerTypeChromeless_field").hide();
    } else {
      _0x4a3a32(".youtubePlayerTypeDefault_field").hide();
      _0x4a3a32('.youtubePlayerTypeChromeless_field').show();
    }
  }).change();
  _0x4a3a32('#vimeoPlayerType').on("change", function () {
    var _0x2c0526 = _0x4a3a32(this).val();
    if (_0x2c0526 == "default") {
      _0x4a3a32('.vimeoPlayerTypeDefault_field').show();
      _0x4a3a32('.vimeoPlayerTypeChromeless_field').hide();
    } else {
      _0x4a3a32(".vimeoPlayerTypeDefault_field").hide();
      _0x4a3a32(".vimeoPlayerTypeChromeless_field").show();
    }
  }).change();
  _0x4a3a32('#rememberPlaybackPosition').on('change', function () {
    var _0x37502f = _0x4a3a32(this).val();
    if (_0x37502f == '1') {
      _0x4a3a32(".playbackPositionKey-field").show();
    } else {
      _0x4a3a32('.playbackPositionKey-field').hide();
    }
  }).change();
  var _0x37f7f4 = _0x4a3a32("#player-item-list");
  _0x4a3a32("#mvp-filter-player").on("keyup.apfilter", function () {
    var _0x158f6e = _0x4a3a32(this).val();
    var _0x4b6b47;
    var _0x2c5962 = 0x0;
    var _0x535c97;
    var _0x4b7b34 = _0x37f7f4.children(".player-item").length;
    for (_0x4b6b47 = 0x0; _0x4b6b47 < _0x4b7b34; _0x4b6b47++) {
      _0x535c97 = _0x37f7f4.children(".player-item").eq(_0x4b6b47).find(".player-title").val();
      if (_0x535c97.indexOf(_0x158f6e) > -0x1) {
        _0x37f7f4.children(".player-item").eq(_0x4b6b47).show();
      } else {
        _0x37f7f4.children(".player-item").eq(_0x4b6b47).hide();
        _0x2c5962++;
      }
    }
  });
  _0x4a3a32(".mvp-player-table").on('click', ".mvp-player-all", function () {
    if (_0x4a3a32(this).is(":checked")) {
      _0x37f7f4.find(".mvp-player-indiv").prop('checked', true);
    } else {
      _0x37f7f4.find('.mvp-player-indiv').prop("checked", false);
    }
  });
  _0x4a3a32("#mvp-delete-players").on("click", function () {
    if (_0x37f7f4.find(".mvp-player-indiv").length == 0x0) {
      return false;
    }
    var _0x40dae0 = _0x37f7f4.find(".mvp-player-indiv:checked");
    if (_0x40dae0.length == 0x0) {
      alert(_0x571282.attr("data-no-players-selected"));
      return false;
    }
    var _0x121822 = confirm(_0x571282.attr("data-sure-to-delete"));
    if (_0x121822) {
      var _0x18e853 = [];
      _0x40dae0.each(function () {
        _0x18e853.push(parseInt(_0x4a3a32(this).closest('.mvp-player-row').attr("data-player-id"), 0xa));
      });
      _0x18e18b(_0x18e853);
    }
  });
  function _0x18e18b(_0x6a8757) {
    _0x1294db.show();
    var _0x47993 = [{
      'name': "action",
      'value': "mvp_delete_player"
    }, {
      'name': 'player_id',
      'value': _0x6a8757
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0x47993,
      'dataType': "json"
    }).done(function (_0x1ce1cb) {
      _0x1294db.hide();
      if (_0x1ce1cb) {
        var _0x47d1f3;
        var _0x12bd22 = _0x6a8757.length;
        for (_0x47d1f3 = 0x0; _0x47d1f3 < _0x12bd22; _0x47d1f3++) {
          _0x37f7f4.find(".mvp-player-row[data-player-id=\"" + _0x6a8757[_0x47d1f3] + "\"]").remove();
        }
        _0x4a3a32(".mvp-player-all").prop("checked", false);
      }
    }).fail(function (_0x5ea4ee, _0x589860, _0xd2f145) {
      console.log(_0x5ea4ee.responseText, _0x589860, _0xd2f145);
      _0x1294db.hide();
    });
  }
  _0x37f7f4.on("click", '.mvp-delete-player', function () {
    var _0x371675 = confirm(_0x571282.attr("data-sure-to-delete"));
    if (_0x371675) {
      var _0x5af2bc = parseInt(_0x4a3a32(this).closest('.mvp-player-row').attr("data-player-id"), 0xa);
      _0x1294db.show();
      _0x18e18b([_0x5af2bc]);
    }
    return false;
  });
  var _0x37479f = _0x4a3a32('#mvp-add-player-modal');
  var _0x24197d = _0x4a3a32(".mvp-modal-bg").on("click", function (_0x3b47be) {
    if (_0x3b47be.target == this) {
      _0x205484();
    }
  });
  _0x349436.on("keyup", function (_0x21c2d6) {
    _0x21c2d6.stopImmediatePropagation();
    _0x21c2d6.preventDefault();
    var _0x52cbe8 = _0x21c2d6.keyCode;
    if (_0x52cbe8 == 0x1b) {
      _0x205484();
    }
  });
  _0x4a3a32('#mvp-add-player-cancel').on("click", function (_0x24ec68) {
    _0x205484();
  });
  var _0x2d0d01;
  _0x4a3a32("#mvp-add-player-submit").on('click', function (_0x40876b) {
    var _0x11f3cb = _0x4a3a32("#player-title");
    if (_0x11f3cb.val().replace(/^\s+|\s+$/g, '').length == 0x0) {
      _0x11f3cb.addClass('aprf');
      _0x24197d.scrollTop(0x0);
      alert(_0x571282.attr('data-title-required'));
      return false;
    }
    if (_0x2d0d01) {
      return false;
    }
    _0x2d0d01 = true;
    var _0x4ce892 = _0x11f3cb.val();
    var _0x34e578 = _0x4a3a32('#preset').val();
    _0x1294db.show();
    _0x205484();
    var _0x5397ea = [{
      'name': "action",
      'value': "mvp_create_player"
    }, {
      'name': "security",
      'value': mvp_data.security
    }, {
      'name': "title",
      'value': _0x4ce892
    }, {
      'name': 'preset',
      'value': _0x34e578
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x5397ea,
      'dataType': "json"
    }).done(function (_0x5c4c03) {
      window.location = _0x37f7f4.attr("data-admin-url") + "?page=mvp_player_manager&action=edit_player&mvp_msg=player_created&player_id=" + _0x5c4c03;
    }).fail(function (_0x417a72, _0x415b88, _0x4bd6bc) {
      console.log(_0x417a72.responseText, _0x415b88, _0x4bd6bc);
      _0x2d0d01 = false;
      _0x205484();
    });
    return false;
  });
  function _0x205484() {
    _0x37479f.hide();
    _0x37479f.find('#player-title').val('').removeClass("aprf");
  }
  _0x4a3a32('#mvp-add-player').on("click", function (_0x4d08ad) {
    _0x487c03();
  });
  function _0x487c03() {
    _0x37479f.show();
    _0x4a3a32("#player-title").focus();
    _0x24197d.scrollTop(0x0);
  }
  var _0x28eddb = _0x4a3a32("#mvp-style-tabs");
  _0x28eddb.find(".mvp-tab-header li").click(function () {
    var _0x5cd6c0 = _0x4a3a32(this);
    var _0x535fe3 = _0x5cd6c0.attr('id');
    if (!_0x5cd6c0.hasClass("mvp-tab-active")) {
      _0x28eddb.find(".mvp-tab-header li").removeClass("mvp-tab-active");
      _0x5cd6c0.addClass('mvp-tab-active');
      _0x28eddb.find(".mvp-tab-content").hide();
      _0x28eddb.find(_0x4a3a32('#' + _0x535fe3 + "-content")).show();
    }
  });
  _0x28eddb.find(".mvp-tab-header li").eq(0x0).addClass("mvp-tab-active");
  _0x28eddb.find(".mvp-tab-content").eq(0x0).show();
  var _0x51b896 = _0x4a3a32("#mvp-general-tabs");
  _0x51b896.find(".mvp-tab-header li").click(function () {
    var _0x296a88 = _0x4a3a32(this);
    var _0xad77dc = _0x296a88.attr('id');
    if (!_0x296a88.hasClass("mvp-tab-active")) {
      _0x51b896.find(".mvp-tab-header li").removeClass("mvp-tab-active");
      _0x296a88.addClass('mvp-tab-active');
      _0x51b896.find(".mvp-tab-content").hide();
      _0x51b896.find(_0x4a3a32('#' + _0xad77dc + "-content")).show();
      if (_0xad77dc == "mvp-tab-media-end-action" && !_0x3e781b) {
        _0x55fdad();
      }
    }
  });
  _0x51b896.find(".mvp-tab-header li").eq(0x0).addClass('mvp-tab-active');
  _0x51b896.find('.mvp-tab-content').eq(0x0).show();
  var _0x31bfe7 = _0x4a3a32("#mvp-css-tabs");
  _0x31bfe7.find(".mvp-tab-header li").click(function () {
    var _0x383605 = _0x4a3a32(this);
    var _0x3d7b4a = _0x383605.attr('id');
    if (!_0x383605.hasClass('mvp-tab-active')) {
      _0x31bfe7.find(".mvp-tab-header li").removeClass("mvp-tab-active");
      _0x383605.addClass('mvp-tab-active');
      _0x31bfe7.find('.mvp-tab-content').hide();
      _0x31bfe7.find(_0x4a3a32('#' + _0x3d7b4a + "-content")).show();
    }
  });
  _0x31bfe7.find(".mvp-tab-header li").eq(0x0).addClass("mvp-tab-active");
  _0x31bfe7.find(".mvp-tab-content").eq(0x0).show();
  _0x31bfe7.find("tr[class^='mvp-css-config']").hide();
  _0x31bfe7.find(".mvp-css-config-" + _0x24394f).show();
  var _0x374d58 = _0x4a3a32("#mvp-translation-tabs");
  _0x374d58.find(".mvp-tab-header li").click(function () {
    var _0x2cffe1 = _0x4a3a32(this);
    var _0x2543b5 = _0x2cffe1.attr('id');
    if (!_0x2cffe1.hasClass("mvp-tab-active")) {
      _0x374d58.find(".mvp-tab-header li").removeClass("mvp-tab-active");
      _0x2cffe1.addClass("mvp-tab-active");
      _0x374d58.find(".mvp-tab-content").hide();
      _0x374d58.find(_0x4a3a32('#' + _0x2543b5 + "-content")).show();
    }
  });
  _0x374d58.find(".mvp-tab-header li").eq(0x0).addClass("mvp-tab-active");
  _0x374d58.find(".mvp-tab-content").eq(0x0).show();
  var _0x17fe6a = _0x4a3a32("#mvp-br-table-wrap").on("click", ".breakPoint_remove", function (_0x4fe537) {
    _0x4a3a32(this).closest(".mvp-br-table").remove();
  });
  _0x17fe6a.sortable();
  if (typeof mvp_breakPoint_arr !== 'undefined') {
    var _0x4d823e;
    var _0xa11b1b = mvp_breakPoint_arr.length;
    for (_0x4d823e = 0x0; _0x4d823e < _0xa11b1b; _0x4d823e++) {
      _0x17ea0b(mvp_breakPoint_arr[_0x4d823e]);
    }
  }
  _0x4a3a32("#breakPoint_add").on('click', function (_0x504e04) {
    _0x17ea0b();
  });
  function _0x17ea0b(_0xa31c13) {
    var _0x3f6847 = _0x4a3a32(".mvp-br-table-orig").clone().removeClass("mvp-br-table-orig").addClass("mvp-br-table").show().appendTo(_0x17fe6a);
    if (typeof _0xa31c13 !== "undefined") {
      _0x3f6847.find('.bp-width').prop({
        'required': true,
        'disabled': false
      }).val(_0xa31c13.width);
      _0x3f6847.find(".bp-column").prop({
        'required': true,
        'disabled': false
      }).val(_0xa31c13.column);
      _0x3f6847.find(".bp-gutter").prop({
        'required': true,
        'disabled': false
      }).val(_0xa31c13.gutter);
    } else {
      _0x3f6847.find(".bp-width").prop({
        'required': true,
        'disabled': false
      });
      _0x3f6847.find('.bp-column').prop({
        'required': true,
        'disabled': false
      });
      _0x3f6847.find(".bp-gutter").prop({
        'required': true,
        'disabled': false
      });
    }
  }
  var _0x22340b = _0x4a3a32("#mvp-caption-br-table-wrap").on("click", '.caption_breakPoint_remove', function (_0x5b570f) {
    _0x4a3a32(this).closest(".mvp-caption-br-table").remove();
  });
  _0x22340b.sortable();
  if (typeof mvp_caption_breakPoint_arr !== "undefined") {
    var _0x4d823e;
    var _0xa11b1b = mvp_caption_breakPoint_arr.length;
    for (_0x4d823e = 0x0; _0x4d823e < _0xa11b1b; _0x4d823e++) {
      _0x446429(mvp_caption_breakPoint_arr[_0x4d823e]);
    }
  }
  _0x4a3a32("#caption_breakPoint_add").on("click", function (_0x4ca9cd) {
    _0x446429();
  });
  function _0x446429(_0x261ffe) {
    var _0x50acbe = _0x4a3a32(".mvp-caption-br-table-orig").clone().removeClass("mvp-caption-br-table-orig").addClass("mvp-caption-br-table").show().appendTo(_0x22340b);
    if (typeof _0x261ffe !== "undefined") {
      _0x50acbe.find(".caption-bp-width").prop({
        'required': true,
        'disabled': false
      }).val(_0x261ffe.width);
      _0x50acbe.find('.caption-bp-font-size').prop({
        'required': true,
        'disabled': false
      }).val(_0x261ffe.font_size);
    } else {
      _0x50acbe.find(".caption-bp-width").prop({
        'required': true,
        'disabled': false
      });
      _0x50acbe.find(".caption-bp-font-size").prop({
        'required': true,
        'disabled': false
      });
    }
  }
  var _0x147357 = _0x4a3a32("#mvp-playbackRate-br-table-wrap").on('click', '.playbackRate_remove', function (_0x3d7cd3) {
    _0x4a3a32(this).closest(".mvp-playbackRate-br-table").remove();
  });
  _0x147357.sortable();
  if (typeof mvp_playbackRate_arr !== 'undefined') {
    var _0x4d823e;
    var _0xa11b1b = mvp_playbackRate_arr.length;
    for (_0x4d823e = 0x0; _0x4d823e < _0xa11b1b; _0x4d823e++) {
      _0x43bf15(mvp_playbackRate_arr[_0x4d823e]);
    }
  }
  _0x4a3a32("#playbackRate_add").on("click", function (_0x257662) {
    _0x43bf15();
  });
  function _0x43bf15(_0x183212) {
    var _0x5792ab = _0x4a3a32('.mvp-playbackRate-br-table-orig').clone().removeClass('mvp-playbackRate-br-table-orig').addClass('mvp-playbackRate-br-table').show().appendTo(_0x147357);
    if (typeof _0x183212 !== 'undefined') {
      _0x5792ab.find('.playbackRate-value').prop({
        'required': true,
        'disabled': false
      }).val(_0x183212.value);
      _0x5792ab.find('.playbackRate-menu-title').prop({
        'required': true,
        'disabled': false
      }).val(_0x183212.menu_title);
    } else {
      _0x5792ab.find(".playbackRate-value").prop({
        'required': true,
        'disabled': false
      });
      _0x5792ab.find(".playbackRate-menu-title").prop({
        'required': true,
        'disabled': false
      });
    }
  }
  var _0x5ceb93 = _0x4a3a32('#mvp-ev-wrap').on("click", ".ev_breakPoint_remove", function (_0x207759) {
    var _0x2be0d2 = confirm("Are you sure to delete?");
    if (_0x2be0d2) {
      _0x4a3a32(this).closest(".ev-unit-wrap").remove();
      _0x15f887();
    }
  });
  if (typeof mvp_elementsVisibility_arr !== "undefined") {
    var _0x4d823e;
    var _0xa11b1b = mvp_elementsVisibility_arr.length;
    for (_0x4d823e = 0x0; _0x4d823e < _0xa11b1b; _0x4d823e++) {
      _0x27ba20(mvp_elementsVisibility_arr[_0x4d823e], true);
    }
    _0x15f887();
  }
  _0x5ceb93.sortable({
    'handle': ".option-toggle",
    'update': function (_0x58443a, _0x5cb4c4) {
      _0x15f887();
    }
  });
  function _0x15f887() {
    var _0x452b00 = 0x0;
    _0x5ceb93.find(".ev-unit-wrap").each(function () {
      var _0x251021 = _0x4a3a32(this);
      _0x251021.find(".ev-elem").each(function () {
        var _0x6c61b7 = _0x4a3a32(this);
        var _0x129340 = _0x6c61b7.attr("data-cname");
        var _0x40677e = "ev[" + _0x452b00 + '][' + _0x129340 + ']';
        _0x6c61b7.attr("name", _0x40677e);
      });
      _0x452b00++;
    });
  }
  _0x4a3a32("#ev_breakPoint_add").on('click', function (_0x2ac76a) {
    _0x27ba20();
    _0x15f887();
  });
  function _0x27ba20(_0x4b828b, _0x3fb3ad) {
    var _0x13c63d = _0x4a3a32('.ev-unit-wrap-orig').clone().removeClass("ev-unit-wrap-orig").addClass("ev-unit-wrap").show().appendTo(_0x5ceb93);
    if (_0x3fb3ad) {
      _0x13c63d.addClass('option-closed');
    }
    if (typeof _0x4b828b !== "undefined") {
      _0x13c63d.find(".ev_width").prop({
        'required': true,
        'disabled': false
      }).val(_0x4b828b.width).on("keyup", function (_0x305ad4) {
        _0x13c63d.find(".option-title").html(_0x4a3a32(this).val());
      });
      _0x13c63d.find(".option-title").html(_0x4b828b.width);
      _0x13c63d.find(".ev_seekbar").prop({
        'checked': _0x4b828b.seekbar == 'on'
      });
      _0x13c63d.find(".ev_play").prop({
        'checked': _0x4b828b.play == 'on'
      });
      _0x13c63d.find(".ev_time").prop({
        'checked': _0x4b828b.time == 'on'
      });
      _0x13c63d.find(".ev_download").prop({
        'checked': _0x4b828b.download == 'on'
      });
      _0x13c63d.find(".ev_share").prop({
        'checked': _0x4b828b.share == 'on'
      });
      _0x13c63d.find(".ev_info").prop({
        'checked': _0x4b828b.info == 'on'
      });
      _0x13c63d.find(".ev_next").prop({
        'checked': _0x4b828b.next == 'on'
      });
      _0x13c63d.find(".ev_previous").prop({
        'checked': _0x4b828b.previous == 'on'
      });
      _0x13c63d.find(".ev_rewind").prop({
        'checked': _0x4b828b.rewind == 'on'
      });
      _0x13c63d.find(".ev_skip_backward").prop({
        'checked': _0x4b828b.skip_backward == 'on'
      });
      _0x13c63d.find(".ev_skip_forward").prop({
        'checked': _0x4b828b.skip_forward == 'on'
      });
      _0x13c63d.find(".ev_fullscreen").prop({
        'checked': _0x4b828b.fullscreen == 'on'
      });
      _0x13c63d.find(".ev_pip").prop({
        'checked': _0x4b828b.pip == 'on'
      });
      _0x13c63d.find(".ev_theater").prop({
        'checked': _0x4b828b.theater == 'on'
      });
      _0x13c63d.find(".ev_volume").prop({
        'checked': _0x4b828b.volume == 'on'
      });
      _0x13c63d.find('.ev_volume_seekbar').prop({
        'checked': _0x4b828b.volume_seekbar == 'on'
      });
      _0x13c63d.find(".ev_playlist").prop({
        'checked': _0x4b828b.playlist == 'on'
      });
      _0x13c63d.find(".ev_quality").prop({
        'checked': _0x4b828b.quality == 'on'
      });
      _0x13c63d.find(".ev_subtitles").prop({
        'checked': _0x4b828b.subtitles == 'on'
      });
      _0x13c63d.find(".ev_cc").prop({
        'checked': _0x4b828b.cc == 'on'
      });
      _0x13c63d.find(".ev_chapter").prop({
        'checked': _0x4b828b.chapter == 'on'
      });
      _0x13c63d.find(".ev_annotations").prop({
        'checked': _0x4b828b.annotations == 'on'
      });
      _0x13c63d.find(".ev_playback_rate").prop({
        'checked': _0x4b828b.playback_rate == 'on'
      });
      _0x13c63d.find('.ev_audio_language').prop({
        'checked': _0x4b828b.audio_language == 'on'
      });
      _0x13c63d.find(".ev_upnext").prop({
        'checked': _0x4b828b.upnext == 'on'
      });
    } else {
      _0x13c63d.find(".ev_width").prop({
        'required': true,
        'disabled': false
      }).on("keyup", function (_0x36ce04) {
        _0x13c63d.find('.option-title').html(_0x4a3a32(this).val());
      });
      _0x13c63d.find(".ev_seekbar").prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_play').prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_time").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_download").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_share").prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_info').prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_next").prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_previous').prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_rewind').prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_skip_backward").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_skip_forward").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_fullscreen").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_pip").prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_theater').prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_volume").prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_volume_seekbar').prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_playlist").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_quality").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_subtitles").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_cc").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_chapter").prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_annotations").prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_playback_rate').prop({
        'disabled': false
      });
      _0x13c63d.find('.ev_audio_language').prop({
        'disabled': false
      });
      _0x13c63d.find(".ev_upnext").prop({
        'disabled': false
      });
    }
  }
  var _0x2fde23 = _0x4a3a32("#vrInfo_preview");
  var _0x151d2f = _0x4a3a32('#vrInfo_remove').on("click", function (_0x1068f4) {
    _0x1068f4.preventDefault();
    _0x2fde23.attr('src', "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x606621.val('');
    _0x151d2f.hide();
  });
  var _0x606621 = _0x4a3a32("#vrInfo").on("keyup", function () {
    if (_0x4a3a32(this).val() == '') {
      _0x2fde23.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
      _0x151d2f.hide();
    }
  });
  if (_0x606621.val() != '') {
    _0x151d2f.show();
  } else {
    _0x151d2f.hide();
  }
  var _0x3c0653 = _0x4a3a32("#logo_preview");
  var _0x11c40e = _0x4a3a32("#logo_remove").on('click', function (_0x29d408) {
    _0x29d408.preventDefault();
    _0x3c0653.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x3905eb.val('');
    _0x11c40e.hide();
  });
  var _0x3905eb = _0x4a3a32("#logoPath").on("keyup", function () {
    if (_0x4a3a32(this).val() == '') {
      _0x3c0653.attr('src', "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
      _0x11c40e.hide();
    }
  });
  if (_0x3905eb.val() != '') {
    _0x11c40e.show();
  } else {
    _0x11c40e.hide();
  }
  var _0x5e445d = _0x4a3a32("#offlineImage_preview");
  var _0x1f76fa = _0x4a3a32("#offlineImage_remove").on("click", function (_0x2f1743) {
    _0x2f1743.preventDefault();
    _0x5e445d.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x2a8aa0.val('');
    _0x1f76fa.hide();
  });
  var _0x2a8aa0 = _0x4a3a32("#offlineImage").on('keyup', function () {
    if (_0x4a3a32(this).val() == '') {
      _0x5e445d.attr('src', "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
      _0x1f76fa.hide();
    }
  });
  if (_0x2a8aa0.val() != '') {
    _0x1f76fa.show();
  } else {
    _0x1f76fa.hide();
  }
  var _0x143edb = _0x4a3a32("#mediaEndImage_preview");
  var _0x15932d = _0x4a3a32("#mediaEndImage_remove").on('click', function (_0x2e7d50) {
    _0x2e7d50.preventDefault();
    _0x143edb.attr('src', "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x38e6c1.val('');
    _0x15932d.hide();
  });
  var _0x38e6c1 = _0x4a3a32("#mediaEndImage").on("keyup", function () {
    if (_0x4a3a32(this).val() == '') {
      _0x143edb.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
      _0x15932d.hide();
    }
  });
  if (_0x38e6c1.val() != '') {
    _0x15932d.show();
  } else {
    _0x15932d.hide();
  }
  var _0x129c07 = _0x4a3a32('#playerLoaderImgSrc_preview');
  var _0x57a5d8 = _0x4a3a32("#playerLoaderImgSrc_remove").on("click", function (_0xf6f2b2) {
    _0xf6f2b2.preventDefault();
    _0x129c07.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x21d427.val('');
    _0x57a5d8.hide();
  });
  var _0x21d427 = _0x4a3a32("#playerLoaderImgSrc").on("keyup", function () {
    if (_0x4a3a32(this).val() == '') {
      _0x129c07.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
      _0x57a5d8.hide();
    }
  });
  if (_0x21d427.val() != '') {
    _0x57a5d8.show();
  } else {
    _0x57a5d8.hide();
  }
  var _0x10bfae = _0x4a3a32("#bigPlayImgSrc_preview");
  var _0xbe2556 = _0x4a3a32('#bigPlayImgSrc_remove').on("click", function (_0x4581f0) {
    _0x4581f0.preventDefault();
    _0x10bfae.attr('src', "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x1547c8.val('');
    _0xbe2556.hide();
  });
  var _0x1547c8 = _0x4a3a32("#bigPlayImgSrc").on('keyup', function () {
    if (_0x4a3a32(this).val() == '') {
      _0x10bfae.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
      _0xbe2556.hide();
    }
  });
  if (_0x1547c8.val() != '') {
    _0xbe2556.show();
  } else {
    _0xbe2556.hide();
  }
  var _0x57c6a9 = [{
    'btn': _0x3b0079.find('#logo_path_upload'),
    'manager': null
  }, {
    'btn': _0x3b0079.find("#offlineImage_upload"),
    'manager': null
  }, {
    'btn': _0x3b0079.find("#mediaEndImage_upload"),
    'manager': null
  }, {
    'btn': _0x3b0079.find('#playerLoaderImgSrc_upload'),
    'manager': null
  }, {
    'btn': _0x3b0079.find("#bigPlayImgSrc_upload"),
    'manager': null
  }, {
    'btn': _0x3b0079.find("#vrInfo_upload"),
    'manager': null
  }];
  _0x41ff99(_0x57c6a9);
  function _0x41ff99(_0x5d59df) {
    var _0x150aa8;
    var _0x3b622f = _0x5d59df.length;
    var _0x2ca4b3;
    for (_0x150aa8 = 0x0; _0x150aa8 < _0x3b622f; _0x150aa8++) {
      _0x2ca4b3 = _0x5d59df[_0x150aa8].btn.attr("data-id", _0x150aa8);
      _0x2ca4b3.on('click', function (_0x307f8d) {
        _0x307f8d.preventDefault();
        var _0x20fd9d;
        var _0x37e1bb;
        var _0x17ee5f = _0x4a3a32(this).attr('id');
        var _0xca7b01 = parseInt(_0x4a3a32(this).attr("data-id"), 0xa);
        var _0x5585f1;
        if (uploadManagerArr[_0xca7b01].manager) {
          uploadManagerArr[_0xca7b01].manager.open();
          return;
        }
        if (_0x17ee5f == "logo_path_upload") {
          _0x20fd9d = "image";
          _0x37e1bb = "#logoPath";
        } else {
          if (_0x17ee5f == 'offlineImage_upload') {
            _0x20fd9d = "image";
            _0x37e1bb = '#offlineImage';
          } else {
            if (_0x17ee5f == "mediaEndImage_upload") {
              _0x20fd9d = "image";
              _0x37e1bb = "#mediaEndImage";
            } else {
              if (_0x17ee5f == "playerLoaderImgSrc_upload") {
                _0x20fd9d = "image";
                _0x37e1bb = '#playerLoaderImgSrc';
              } else {
                if (_0x17ee5f == "bigPlayImgSrc_upload") {
                  _0x20fd9d = 'image';
                  _0x37e1bb = "#bigPlayImgSrc";
                } else if (_0x17ee5f == "vrInfo_upload") {
                  _0x20fd9d = 'image';
                  _0x37e1bb = "#vrInfo";
                }
              }
            }
          }
        }
        _0x5585f1 = wp.media({
          'library': {
            'type': _0x20fd9d
          }
        }).on("select", function () {
          var _0x2d1885 = _0x5585f1.state().get("selection").first().toJSON();
          _0x4a3a32(_0x37e1bb).val(_0x2d1885.url);
          if (_0x37e1bb == "#logoPath") {
            _0x3c0653.attr('src', _0x2d1885.url);
            _0x11c40e.show();
          } else {
            if (_0x37e1bb == "#offlineImage") {
              _0x5e445d.attr("src", _0x2d1885.url);
              _0x1f76fa.show();
            } else {
              if (_0x37e1bb == '#mediaEndImage') {
                _0x143edb.attr("src", _0x2d1885.url);
                _0x15932d.show();
              } else {
                if (_0x37e1bb == '#playerLoaderImgSrc') {
                  _0x129c07.attr("src", _0x2d1885.url);
                  _0x57a5d8.show();
                  _0x4a3a32('#playerLoaderImgW').val(_0x2d1885.width);
                  _0x4a3a32("#playerLoaderImgH").val(_0x2d1885.height);
                } else {
                  if (_0x37e1bb == "#bigPlayImgSrc") {
                    _0x10bfae.attr("src", _0x2d1885.url);
                    _0xbe2556.show();
                    _0x4a3a32('#bigPlayImgW').val(_0x2d1885.width);
                    _0x4a3a32("#bigPlayImgH").val(_0x2d1885.height);
                  } else if (_0x37e1bb == '#vrInfo') {
                    _0x2fde23.attr("src", _0x2d1885.url);
                    _0x151d2f.show();
                  }
                }
              }
            }
          }
        }).open();
        uploadManagerArr[_0xca7b01].manager = _0x5585f1;
      });
    }
  }
  _0x4a3a32(".mvp-table").on('click', '.mvp-export-player-btn', function () {
    _0x1294db.show();
    var _0x110897 = _0x4a3a32(this).attr('data-player-id');
    var _0xd89f4a = _0x4a3a32(this).closest(".mvp-player-row").find(".title-editable").val();
    _0xd89f4a = _0xd89f4a.replace(/\W/g, '');
    var _0x4c728e = [{
      'name': "action",
      'value': "mvp_export_player"
    }, {
      'name': "player_id",
      'value': _0x110897
    }, {
      'name': "player_title",
      'value': _0xd89f4a
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x4c728e,
      'dataType': "json"
    }).done(function (_0x16676f) {
      _0x1294db.hide();
      if (_0x16676f.zip) {
        location.href = _0x16676f.zip;
        var _0x5457b3 = [{
          'name': "action",
          'value': "mvp_clean_export"
        }, {
          'name': "zipname",
          'value': _0x16676f.zip_clean
        }, {
          'name': "security",
          'value': mvp_data.security
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': "post",
          'data': _0x5457b3
        });
      }
    }).fail(function (_0x15f560, _0x27a528, _0x3ba12a) {
      console.log(_0x15f560.responseText, _0x27a528, _0x3ba12a);
      _0x1294db.hide();
    });
    return false;
  });
  var _0x4e4c4c = _0x4a3a32("#mvp-player-file-input").on("change", _0x3e948e);
  var _0x70a348 = _0x4a3a32('#mvp-import-player').click(function () {
    _0x4e4c4c.trigger('click');
    return false;
  });
  function _0x3e948e(_0x597add) {
    if (_0x597add.target.files.length == 0x0) {
      return;
    }
    var _0x51b704 = _0x597add.target.files[0x0].name;
    if (_0x51b704.indexOf('mvp_player_id_') == -0x1) {
      alert(_0x571282.attr("data-upload-previously-exported-player-zip"));
      return;
    }
    _0x1294db.show();
    _0x70a348.css("display", 'none');
    var _0x1e2049 = _0x597add.target.files;
    var _0x447f1a = new FormData();
    _0x4a3a32.each(_0x1e2049, function (_0x1cfc03, _0x53a2b7) {
      _0x447f1a.append('mvp_file_upload', _0x53a2b7);
    });
    _0x447f1a.append("action", "mvp_import_player");
    _0x447f1a.append('security', mvp_data.security);
    _0x4e4c4c.val('');
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x447f1a,
      'dataType': "json",
      'processData': false,
      'contentType': false
    }).done(function (_0x58eea8) {
      if (_0x58eea8.player) {
        _0x2d2207(_0x58eea8.player);
      } else {
        _0x70a348.css("display", "inline-block");
        _0x1294db.hide();
        alert(_0x571282.attr("data-error-importing"));
      }
    }).fail(function (_0x2effe7, _0x36cc7f, _0x173527) {
      console.log(_0x2effe7.responseText, _0x36cc7f, _0x173527);
      _0x70a348.css('display', "inline-block");
      _0x1294db.hide();
      alert(_0x571282.attr("data-error-importing"));
    });
  }
  function _0x2d2207(_0x3ccc6b) {
    if (typeof _0x4a3a32.csv === "undefined") {
      var _0xee5fcc = document.createElement('script');
      _0xee5fcc.type = "text/javascript";
      _0xee5fcc.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js";
      _0xee5fcc.onload = _0xee5fcc.onreadystatechange = function () {
        if (!this.readyState || this.readyState == "complete") {
          _0x2d2207(_0x3ccc6b);
        }
      };
      _0xee5fcc.onerror = function () {
        console.log("Error loading " + this.src);
      };
      var _0x445d7c = document.getElementsByTagName('script')[0x0];
      _0x445d7c.parentNode.insertBefore(_0xee5fcc, _0x445d7c);
    } else {
      _0x4a3a32.ajax({
        'type': "GET",
        'url': _0x3ccc6b,
        'dataType': 'text'
      }).done(function (_0x3d87ce) {}).fail(function (_0x1b40fd, _0x1d350d, _0x55f2cb) {
        console.log("Error process CSV: " + _0x1b40fd.responseText, _0x1d350d, _0x55f2cb);
        _0x1294db.hide();
        _0x70a348.css("display", 'inline-block');
        alert(_0x571282.attr("data-error-importing"));
      });
    }
  }
  _0x4a3a32(".mvp-duplicate-player").on("click", function () {
    return _0x41faf2("Enter title for new player:", _0x4a3a32(this));
  });
  function _0x41faf2(_0x5e0f0e, _0x4e60a1) {
    var _0x47d09f = prompt(_0x5e0f0e);
    if (_0x47d09f == null) {
      return false;
    } else {
      if (_0x47d09f.replace(/^\s+|\s+$/g, '').length == 0x0) {
        _0x41faf2(_0x5e0f0e, _0x4e60a1);
        return false;
      } else {
        var _0x15c235 = [{
          'name': "action",
          'value': "mvp_duplicate_player"
        }, {
          'name': "security",
          'value': mvp_data.security
        }, {
          'name': 'title',
          'value': _0x47d09f
        }, {
          'name': "player_id",
          'value': _0x4e60a1.closest(".mvp-player-row").attr('data-player-id')
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': 'post',
          'data': _0x15c235,
          'dataType': "json"
        }).done(function (_0x463a66) {
          window.location = _0x37f7f4.attr('data-admin-url') + "?page=mvp_player_manager&action=edit_player&mvp_msg=player_created&player_id=" + _0x463a66;
        }).fail(function (_0x29334e, _0x3937e4, _0x427830) {
          console.log(_0x29334e.responseText, _0x3937e4, _0x427830);
        });
      }
    }
  }
  var _0x201a2f = _0x4a3a32("#media-item-list");
  var _0x18c399 = _0x4a3a32('#media-table');
  var _0x29ee86 = _0x18c399.attr("data-playlist-id");
  var _0x393784;
  var _0x231a39;
  if (typeof _0x31c77f !== "undefined") {
    _0x393784 = new _0x31c77f();
  }
  var _0x316c99 = _0x4a3a32("#mvp-add-playlist-modal");
  var _0x479baf = _0x316c99.find(".mvp-modal-bg").on('click', function (_0x49c29f) {
    if (_0x49c29f.target == this) {
      _0x35add8();
    }
  });
  _0x4a3a32('#mvp-add-playlist-cancel').on("click", function (_0x1fd77b) {
    _0x35add8();
    _0x1294db.hide();
  });
  var _0x4c5e02;
  _0x4a3a32("#mvp-add-playlist-submit").on("click", function (_0x17630b) {
    var _0x59d984 = _0x4a3a32("#playlist-title");
    if (_0x59d984.val().replace(/^\s+|\s+$/g, '').length == 0x0) {
      _0x59d984.addClass("aprf");
      _0x479baf.scrollTop(0x0);
      alert(_0x571282.attr("data-title-required"));
      _0x4a3a32("#playlist-title").focus();
      return false;
    }
    if (_0x4c5e02) {
      return false;
    }
    _0x4c5e02 = true;
    var _0x24ac56 = _0x59d984.val();
    var _0x19a1fd = !!_0x4a3a32("#is-backend-retrieved").is(":checked");
    var _0x3b7e28 = {
      'isAdminRetrieved': _0x19a1fd
    };
    _0x1294db.show();
    _0x35add8();
    var _0xdf96c1 = [{
      'name': "action",
      'value': "mvp_create_playlist"
    }, {
      'name': "security",
      'value': mvp_data.security
    }, {
      'name': 'title',
      'value': _0x24ac56
    }, {
      'name': "playlist_options",
      'value': JSON.stringify(_0x3b7e28)
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0xdf96c1,
      'dataType': "json"
    }).done(function (_0x1e69a1) {
      window.location = _0x5e722b.attr("data-admin-url") + '?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=' + _0x1e69a1;
    }).fail(function (_0x4b1716, _0x45ac4b, _0x2b03ae) {
      console.log(_0x4b1716.responseText, _0x45ac4b, _0x2b03ae);
      _0x4c5e02 = false;
      _0x35add8();
      _0x1294db.hide();
    });
    return false;
  });
  function _0x35add8() {
    _0x316c99.hide();
    _0x316c99.find("#playlist-title").val('').removeClass("aprf");
  }
  _0x4a3a32("#mvp-add-playlist").on("click", function (_0x4494bd) {
    _0x830a15();
  });
  function _0x830a15() {
    _0x316c99.show();
    _0x4a3a32('#playlist-title').focus();
    _0x479baf.scrollTop(0x0);
  }
  var _0x3368d4 = _0x4a3a32("#mvp-pag-per-page-num");
  if (localStorage && localStorage.getItem("mvp_media_paginaton_per_page")) {
    _0x3368d4.val(localStorage.getItem("mvp_media_paginaton_per_page"));
  }
  var _0x4c9c01 = [];
  var _0x4b6e20 = 0x0;
  var _0x587dc6 = parseInt(_0x3368d4.val(), 0xa);
  var _0x4684cb;
  var _0x545b4f;
  var _0x5c0fbe;
  var _0x330b9c;
  var _0x11e49c = _0x4a3a32(".mvp-pagination-wrap");
  function _0x1b9cbe(_0x10a692) {
    _0x330b9c = _0x4684cb - 0x1;
    if (_0x4c9c01.length % _0x587dc6 == 0x0) {
      _0x330b9c++;
    }
    _0x4c9c01 = [];
    var _0x1b8a91 = 0x0;
    _0x201a2f.find('.media-item').each(function () {
      _0x4c9c01.push(_0x4a3a32(this).addClass("mvp-pagination-hidden").attr("data-id", _0x1b8a91));
      _0x1b8a91++;
    });
    _0x4684cb = Math.ceil(_0x4c9c01.length / _0x587dc6);
    if (_0x10a692) {
      _0x4b6e20 = _0x330b9c;
    }
    if (_0x4b6e20 > _0x4684cb - 0x1) {
      _0x4b6e20 = _0x4684cb - 0x1;
    }
    if (_0x4684cb > 0x1) {
      _0x520409(_0x4b6e20);
    } else {
      _0x11e49c.html('');
    }
    if (_0x4c9c01.length) {
      _0x4e8daf();
    }
  }
  var _0x4d823e = 0x0;
  _0x201a2f.find('.media-item').each(function () {
    _0x4c9c01.push(_0x4a3a32(this).attr("data-id", _0x4d823e));
    _0x4d823e++;
  });
  _0x4a3a32("#mvp-pag-per-page-btn").on("click", function () {
    if (_0x3368d4.val().replace(/^\s+|\s+$/g, '').length == 0x0) {
      _0x3368d4.focus();
      alert(_0x571282.attr("data-enter-number"));
      return false;
    }
    _0x587dc6 = parseInt(_0x3368d4.val(), 0xa);
    if (localStorage) {
      localStorage.setItem('mvp_media_paginaton_per_page', _0x587dc6);
    }
    _0x4684cb = Math.ceil(_0x4c9c01.length / _0x587dc6);
    _0x4b6e20 = 0x0;
    if (_0x4684cb > 0x1) {
      _0x520409(_0x4b6e20);
    } else {
      _0x11e49c.html('');
    }
    if (_0x4c9c01.length) {
      _0x4e8daf();
    }
  });
  function _0x4e8daf() {
    _0x201a2f.find('.media-item').addClass('mvp-pagination-hidden');
    var _0x598703;
    var _0x5664f9 = _0x4b6e20 * _0x587dc6;
    var _0x33d5d1 = _0x5664f9 + _0x587dc6;
    if (_0x33d5d1 > _0x4c9c01.length) {
      _0x33d5d1 = _0x4c9c01.length;
    }
    for (_0x598703 = _0x5664f9; _0x598703 < _0x33d5d1; _0x598703++) {
      _0x4c9c01[_0x598703].removeClass("mvp-pagination-hidden");
    }
  }
  _0x4684cb = Math.ceil(_0x4c9c01.length / _0x587dc6);
  if (_0x4684cb > 0x1) {
    _0x520409(_0x4b6e20);
  }
  if (_0x4c9c01.length) {
    _0x4e8daf();
  }
  function _0x520409(_0x4b1e85) {
    _0x4b1e85 += 0x1;
    var _0x55e06d;
    var _0x47f811;
    var _0x52dfe6 = "<div class=\"mvp-pagination-container\">";
    if (_0x4b1e85 > 0x1) {
      _0x52dfe6 += "<div class=\"mvp-pagination-page mvp-pagination-first\" data-page-id=\"first\" title=\"First\">First</div>";
      _0x52dfe6 += "<div class=\"mvp-pagination-page mvp-pagination-prev\" data-page-id=\"prev\" title=\"Previous\">Prev</div>";
    }
    if (_0x4b1e85 - 0x2 > 0x0 && _0x4b1e85 == _0x4684cb) {
      _0x55e06d = _0x4b1e85 - 0x2;
      _0x47f811 = _0x55e06d - 0x1;
      _0x52dfe6 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x47f811 + "\">" + _0x55e06d + "</div>";
    }
    if (_0x4b1e85 - 0x1 > 0x0) {
      _0x55e06d = _0x4b1e85 - 0x1;
      _0x47f811 = _0x55e06d - 0x1;
      _0x52dfe6 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x47f811 + "\">" + _0x55e06d + "</div>";
    }
    _0x55e06d = _0x4b1e85;
    _0x47f811 = _0x55e06d - 0x1;
    _0x52dfe6 += "<div class=\"mvp-pagination-page mvp-pagination-currentpage\" data-page-id=\"" + _0x47f811 + "\">" + _0x55e06d + '</div>';
    if (_0x4b1e85 + 0x1 < _0x4684cb) {
      _0x55e06d = _0x4b1e85 + 0x1;
      _0x47f811 = _0x55e06d - 0x1;
      _0x52dfe6 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x47f811 + "\">" + _0x55e06d + "</div>";
    }
    if (_0x4b1e85 + 0x2 <= _0x4684cb && _0x4b1e85 == 0x1) {
      _0x55e06d = _0x4b1e85 + 0x2;
      _0x47f811 = _0x55e06d - 0x1;
      _0x52dfe6 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x47f811 + "\">" + _0x55e06d + '</div>';
    }
    if (_0x4b1e85 == _0x4684cb - 0x1) {
      _0x55e06d = _0x4684cb;
      _0x47f811 = _0x55e06d - 0x1;
      _0x52dfe6 += "<div class=\"mvp-pagination-page\" data-page-id=\"" + _0x47f811 + "\">" + _0x55e06d + "</div>";
    }
    if (_0x4b1e85 < _0x4684cb) {
      _0x52dfe6 += "<div class=\"mvp-pagination-page mvp-pagination-next\" data-page-id=\"next\" title=\"Next\">Next</div>";
      _0x52dfe6 += "<div class=\"mvp-pagination-page mvp-pagination-last\" data-page-id=\"last\" title=\"Last\">Last</div>";
    }
    _0x52dfe6 += "</div>";
    _0x52dfe6 += "<div class=\"mvp-pagination-total\">Page " + _0x4b1e85 + " of " + _0x4684cb + "</div>";
    _0x11e49c.html(_0x52dfe6);
    if (!_0x545b4f) {
      _0x545b4f = true;
      _0x11e49c.on("click", ".mvp-pagination-page:not(.mvp-pagination-currentpage)", function () {
        if (_0x5c0fbe) {
          _0x5c0fbe.removeClass("mvp-pagination-currentpage");
        }
        _0x5c0fbe = _0x4a3a32(this).addClass('mvp-pagination-currentpage');
        var _0x36eb23 = _0x4a3a32(this).attr("data-page-id");
        if (_0x36eb23 == 'prev') {
          _0x4b6e20 -= 0x1;
        } else {
          if (_0x36eb23 == "next") {
            _0x4b6e20 += 0x1;
          } else {
            if (_0x36eb23 == 'first') {
              _0x4b6e20 = 0x0;
            } else {
              if (_0x36eb23 == "last") {
                _0x4b6e20 = _0x4684cb - 0x1;
              } else {
                _0x4b6e20 = parseInt(_0x36eb23, 0xa);
              }
            }
          }
        }
        if (_0x4684cb > 0x1) {
          _0x520409(_0x4b6e20);
        } else {
          _0x11e49c.html('');
        }
        if (_0x4c9c01.length) {
          _0x4e8daf();
        }
      });
      _0x5c0fbe = _0x11e49c.find(".mvp-pagination-currentpage");
    }
  }
  var _0xd4fdee = {
    'type': 'id',
    'asc': true
  };
  if (localStorage) {
    var _0x54a06a = "mvp_last_media_sort_in_backend_pid" + _0x29ee86;
    if (localStorage.getItem(_0x54a06a)) {
      _0xd4fdee = JSON.parse(localStorage.getItem(_0x54a06a));
      _0x18c399.find(".mvp-sort-field[data-type=\"" + _0xd4fdee.type + "\"]").attr("data-asc", _0xd4fdee.asc).click();
    }
  }
  _0x4ece95();
  function _0x4ece95() {
    _0x18c399.find(".mvp-triangle-dir-wrap, .mvp-triangle-dir").hide();
    if (_0xd4fdee.asc == true) {
      _0x18c399.find(".mvp-sort-field[data-type=\"" + _0xd4fdee.type + "\"]").find(".mvp-triangle-dir-wrap").show().find(".mvp-triangle-dir-down").show();
    } else {
      _0x18c399.find(".mvp-sort-field[data-type=\"" + _0xd4fdee.type + "\"]").find(".mvp-triangle-dir-wrap").show().find(".mvp-triangle-dir-up").show();
    }
  }
  _0x4a3a32('.mvp-sort-field').on("click", function (_0x4abdf9) {
    _0x4abdf9.preventDefault();
    var _0x5bab4a = _0x4a3a32(this);
    var _0x193746 = _0x5bab4a.attr("data-asc") == 'true';
    var _0x4ae726 = _0x201a2f.find('.media-item');
    var _0x572970 = _0x4ae726.length;
    var _0x221a51 = _0x5bab4a.attr("data-type");
    if (_0x572970 == 0x0) {
      return false;
    }
    if (_0x221a51 == 'title' || _0x221a51 == 'artist') {
      _0x406bc8(_0x4c9c01, ".media-" + _0x221a51, _0x193746);
    } else {
      _0x153b05(_0x4c9c01, ".media-" + _0x221a51, _0x193746);
    }
    _0x193746 = !_0x193746;
    _0x5bab4a.attr("data-asc", _0x193746);
    if (localStorage) {
      _0xd4fdee.type = _0x221a51;
      _0xd4fdee.asc = _0x193746;
      var _0x2d5042 = "mvp_last_media_sort_in_backend_pid" + _0x29ee86;
      localStorage.setItem(_0x2d5042, JSON.stringify(_0xd4fdee));
    }
    _0x4ece95();
    var _0x148e2c;
    var _0x34ae00 = [];
    for (_0x148e2c = 0x0; _0x148e2c < _0x572970; _0x148e2c++) {
      _0x34ae00.push(parseInt(_0x4c9c01[_0x148e2c].attr("data-id"), 0xa));
    }
    _0x201a2f.append(_0x4a3a32.map(_0x34ae00, function (_0x47925f) {
      return _0x4ae726[_0x47925f];
    }));
    var _0x148e2c = 0x0;
    _0x201a2f.find(".media-item").each(function () {
      _0x4a3a32(this).attr('data-id', _0x148e2c);
      _0x148e2c++;
    });
    _0x4d54b3();
  });
  var _0x2c1de7;
  function _0x4d54b3() {
    if (_0x2c1de7) {
      return false;
    }
    _0x2c1de7 = true;
    var _0x1d733f = [];
    var _0x236235 = [];
    _0x201a2f.find(".media-item").each(function () {
      _0x1d733f.push(parseInt(_0x4a3a32(this).attr("data-media-id"), 0xa));
      _0x236235.push(parseInt(_0x4a3a32(this).attr("data-order-id"), 0xa));
    });
    _0x236235.sort(_0xe2ade8);
    var _0x1ac255 = [{
      'name': 'action',
      'value': "mvp_update_media_order"
    }, {
      'name': "media_id_arr",
      'value': _0x1d733f
    }, {
      'name': "order_id_arr",
      'value': _0x236235
    }, {
      'name': "playlist_id",
      'value': _0x4a3a32(".mvp-admin").attr("data-playlist-id")
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0x1ac255,
      'dataType': "json"
    }).done(function (_0x342842) {
      _0x2c1de7 = false;
    }).fail(function (_0x1855a1, _0x40404e, _0x36c9fd) {
      console.log(_0x1855a1, _0x40404e, _0x36c9fd);
      _0x2c1de7 = false;
    });
  }
  _0x4a3a32("#mvp-playlists-order").one("click", function () {
    var _0x27a45f = _0x4a3a32("#mvp-playlists-order-by").val();
    window.location.href = _0x27a45f;
  });
  if (typeof _0x4a3a32.fn.select2 !== "undefined") {
    var _0xc7ae14 = _0x4a3a32("#additional_playlist_field");
    var _0x5742a6 = _0x4a3a32('#mvp-additional-playlist');
    var _0x586fd1 = _0x4a3a32("#mvp-add-media-playlist-list").select2({
      'placeholder': _0x571282.attr("data-select-additional-playlists"),
      'dropdownParent': _0x4a3a32("#mvp-edit-media-modal")
    }).on("change", function (_0x44196c) {
      _0x5742a6.val(_0x586fd1.val());
    });
    _0x4a3a32("#mvp-clear-additional-playlist").on('click', function () {
      _0x4a3a32("#mvp-add-media-playlist-list").val('').trigger("change");
    });
  }
  var _0x5e722b = _0x4a3a32("#playlist-item-list");
  _0x4a3a32("#mvp-filter-playlist").on("keyup.apfilter", function () {
    var _0x381b33 = _0x4a3a32(this).val();
    var _0x2d36d7;
    var _0x253005 = 0x0;
    var _0x27f8ab;
    var _0x35c9c2 = _0x5e722b.children('.playlist-item').length;
    for (_0x2d36d7 = 0x0; _0x2d36d7 < _0x35c9c2; _0x2d36d7++) {
      _0x27f8ab = _0x5e722b.children(".playlist-item").eq(_0x2d36d7).find(".playlist-title").val();
      if (_0x27f8ab.indexOf(_0x381b33) > -0x1) {
        _0x5e722b.children('.playlist-item').eq(_0x2d36d7).show();
      } else {
        _0x5e722b.children(".playlist-item").eq(_0x2d36d7).hide();
        _0x253005++;
      }
    }
  });
  _0x4a3a32('.mvp-playlist-table').on("click", ".mvp-playlist-all", function () {
    if (_0x4a3a32(this).is(":checked")) {
      _0x5e722b.find(".mvp-playlist-indiv").prop("checked", true);
    } else {
      _0x5e722b.find('.mvp-playlist-indiv').prop("checked", false);
    }
  });
  _0x4a3a32('#mvp-delete-playlists').on("click", function () {
    if (_0x5e722b.find(".mvp-playlist-indiv").length == 0x0) {
      return false;
    }
    var _0x486acb = _0x5e722b.find(".mvp-playlist-indiv:checked");
    if (_0x486acb.length == 0x0) {
      alert(_0x571282.attr("data-playlist-selected"));
      return false;
    }
    var _0x5496ae = confirm(_0x571282.attr("data-sure-to-delete"));
    if (_0x5496ae) {
      var _0x4c2ace = [];
      _0x486acb.each(function () {
        _0x4c2ace.push(parseInt(_0x4a3a32(this).attr("data-playlist-id"), 0xa));
      });
      _0x16df3b(_0x4c2ace);
    }
  });
  _0x5e722b.on('click', ".mvp-delete-playlist", function () {
    var _0x14a7b1 = confirm(_0x571282.attr("data-sure-to-delete"));
    if (_0x14a7b1) {
      var _0x4eb1be = parseInt(_0x4a3a32(this).closest('.mvp-playlist-row').attr("data-playlist-id"), 0xa);
      _0x16df3b([_0x4eb1be]);
    }
    return false;
  });
  function _0x16df3b(_0x408410) {
    _0x1294db.show();
    var _0x5e49bc = [{
      'name': "action",
      'value': 'mvp_delete_playlist'
    }, {
      'name': "playlist_id",
      'value': _0x408410
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x5e49bc,
      'dataType': "json"
    }).done(function (_0x206ef2) {
      _0x1294db.hide();
      if (_0x206ef2) {
        var _0x1944fc;
        var _0x145a00 = _0x408410.length;
        for (_0x1944fc = 0x0; _0x1944fc < _0x145a00; _0x1944fc++) {
          _0x5e722b.find(".mvp-playlist-row[data-playlist-id=\"" + _0x408410[_0x1944fc] + "\"]").remove();
        }
        _0x4a3a32(".mvp-playlist-all").prop("checked", false);
      }
    }).fail(function (_0x5d4fa0, _0x1e0be0, _0x43c823) {
      console.log(_0x5d4fa0.responseText, _0x1e0be0, _0x43c823);
      _0x1294db.hide();
    });
  }
  var _0x544184 = _0x4a3a32("#mvp-playlist-options-tabs");
  _0x544184.find(".mvp-tab-header li").click(function () {
    var _0x46e55a = _0x4a3a32(this);
    var _0x5a3f21 = _0x46e55a.attr('id');
    if (!_0x46e55a.hasClass('mvp-tab-active')) {
      _0x544184.find(".mvp-tab-header li").removeClass("mvp-tab-active");
      _0x46e55a.addClass("mvp-tab-active");
      _0x544184.find(".mvp-tab-content").hide();
      _0x544184.find(_0x4a3a32('#' + _0x5a3f21 + '-content')).show();
    }
  });
  _0x544184.find(".mvp-tab-header li").eq(0x0).addClass("mvp-tab-active");
  _0x544184.find(".mvp-tab-content").eq(0x0).show();
  _0x4a3a32("#pl_vast_upload").on('click', function (_0xf905d4) {
    var _0x5a1114 = _0x4a3a32(this);
    var _0x43466d = wp.media({
      'library': {
        'type': ''
      }
    });
    _0x43466d.on("select", function () {
      var _0x4b79f3 = _0x43466d.state().get('selection').first().toJSON();
      _0x5a1114.closest('#pl_vast_field').find("#vast").val(_0x4b79f3.url);
    }).open();
  });
  var _0xb62561 = _0x4a3a32("#mvp-media-tabs");
  _0xb62561.find(".mvp-tab-header li").click(function () {
    var _0x1a5198 = _0x4a3a32(this);
    var _0x435a47 = _0x1a5198.attr('id');
    if (!_0x1a5198.hasClass("mvp-tab-active")) {
      _0xb62561.find(".mvp-tab-header li").removeClass("mvp-tab-active");
      _0x1a5198.addClass("mvp-tab-active");
      _0xb62561.find(".mvp-tab-content").hide();
      _0xb62561.find(_0x4a3a32('#' + _0x435a47 + '-content')).show();
      if (_0x435a47 == "mvp-tab-media-adverts") {}
    }
  });
  _0xb62561.find(".mvp-tab-header li").eq(0x0).addClass("mvp-tab-active");
  _0xb62561.find('.mvp-tab-content').eq(0x0).show();
  var _0x3cdbdd = _0x4a3a32("#mvp-quick-sh-tabs");
  _0x3cdbdd.find(".mvp-tab-header li").click(function () {
    var _0x8f2b49 = _0x4a3a32(this);
    var _0x3c8c0a = _0x8f2b49.attr('id');
    if (!_0x8f2b49.hasClass("mvp-tab-active")) {
      _0x3cdbdd.find(".mvp-tab-header li").removeClass("mvp-tab-active");
      _0x8f2b49.addClass("mvp-tab-active");
      _0x3cdbdd.find(".mvp-tab-content").hide();
      _0x3cdbdd.find(_0x4a3a32('#' + _0x3c8c0a + '-content')).show();
    }
  });
  _0x3cdbdd.find(".mvp-tab-header li").eq(0x0).addClass("mvp-tab-active");
  _0x3cdbdd.find(".mvp-tab-content").eq(0x0).show();
  var _0x431098 = _0x4a3a32("#pl_thumb_preview");
  var _0x53929f = _0x4a3a32("#pl_thumb_remove").on('click', function (_0x48b9b8) {
    _0x48b9b8.preventDefault();
    _0x431098.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x42b41b.val('');
  });
  var _0x42b41b = _0x4a3a32("#pl_thumb").on("keyup", function () {
    if (_0x4a3a32(this).val() == '') {
      _0x431098.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    }
  });
  if (_0x42b41b.val() != '') {
    _0x53929f.show();
  }
  _0x201a2f.sortable({
    'handle': ".media-id",
    'placeholder': "ui-placeholder",
    'tolerance': "pointer",
    'start': function (_0x263393, _0x252f26) {
      _0x252f26.placeholder.html("<td colspan='10'></td>");
      _0x252f26.placeholder.height(_0x252f26.item.height());
    },
    'update': function (_0x5dd47f, _0x119537) {
      var _0x4366dd = "mvp_last_media_sort_in_backend_pid" + _0x29ee86;
      localStorage.removeItem(_0x4366dd);
      _0x4d54b3();
    }
  });
  var _0x230c6f;
  _0x4a3a32("#mvp-filter-media").on('keyup.apfilter', function () {
    var _0x778daf = _0x4a3a32(this).val();
    var _0x525f0c;
    var _0x588e8e = 0x0;
    var _0x4eb253;
    var _0x46ed48;
    var _0x43f988 = _0x201a2f.children(".media-item").length;
    if (!_0x230c6f) {
      _0x201a2f.children(".media-item").each(function () {
        var _0x4cdf38 = _0x4a3a32(this);
        if (_0x4cdf38.hasClass('mvp-pagination-hidden')) {
          _0x4cdf38.addClass("mvp-was-pagination-hidden").removeClass("mvp-pagination-hidden");
        }
      });
      _0x230c6f = true;
    }
    for (_0x525f0c = 0x0; _0x525f0c < _0x43f988; _0x525f0c++) {
      _0x4eb253 = _0x201a2f.children('.media-item').eq(_0x525f0c);
      _0x46ed48 = _0x4eb253.find(".media-title").html().toLowerCase();
      if (_0x778daf == '') {
        _0x201a2f.children(".media-item").each(function () {
          var _0x59e910 = _0x4a3a32(this).removeClass("mvp-filter-hidden mvp-filter-shown");
          if (_0x59e910.hasClass("mvp-was-pagination-hidden")) {
            _0x59e910.removeClass("mvp-was-pagination-hidden").addClass("mvp-pagination-hidden");
          }
        });
        _0x230c6f = false;
      } else if (_0x46ed48.indexOf(_0x778daf) > -0x1) {
        _0x4eb253.addClass("mvp-filter-shown").removeClass("mvp-filter-hidden");
      } else {
        _0x4eb253.removeClass("mvp-filter-shown").addClass("mvp-filter-hidden");
        _0x588e8e++;
      }
    }
  });
  _0x18c399.on("click", '.mvp-media-all', function () {
    if (_0x4a3a32(this).is(":checked")) {
      _0x201a2f.find(".media-item:not(.mvp-pagination-hidden)").find(".mvp-media-indiv").prop("checked", true);
    } else {
      _0x201a2f.find(".media-item:not(.mvp-pagination-hidden)").find(".mvp-media-indiv").prop('checked', false);
    }
  });
  _0x4a3a32("#mvp-delete-media").on("click", function () {
    if (_0x201a2f.find('.mvp-media-indiv').length == 0x0) {
      return false;
    }
    var _0x46cdbc = _0x201a2f.find(".mvp-media-indiv:checked");
    if (_0x46cdbc.length == 0x0) {
      alert(_0x571282.attr("data-media-selected"));
      return false;
    }
    var _0x3a96c3 = confirm(_0x571282.attr('data-sure-to-delete'));
    if (_0x3a96c3) {
      _0x1294db.show();
      var _0x5e429a = [];
      _0x46cdbc.each(function () {
        _0x5e429a.push(parseInt(_0x4a3a32(this).closest(".media-item").attr("data-media-id"), 0xa));
      });
      _0x32d93a(_0x5e429a);
    }
  });
  _0x18c399.on("click", ".mvp-delete-media", function () {
    var _0x3e0cb6 = confirm(_0x571282.attr('data-sure-to-delete'));
    if (_0x3e0cb6) {
      var _0x503b50 = _0x4a3a32(this).closest('.media-item').attr("data-media-id");
      var _0x18b442 = [_0x503b50];
      _0x32d93a(_0x18b442);
    }
    return false;
  });
  function _0x32d93a(_0x1e695a) {
    var _0x141b7e = [{
      'name': "action",
      'value': "mvp_delete_media"
    }, {
      'name': "media_id",
      'value': _0x1e695a
    }, {
      'name': 'security',
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0x141b7e,
      'dataType': "json"
    }).done(function (_0x1e03dc) {
      _0x1294db.hide();
      if (_0x1e03dc > 0x0) {
        var _0x514b7a;
        var _0xefc0fb = _0x1e695a.length;
        for (_0x514b7a = 0x0; _0x514b7a < _0xefc0fb; _0x514b7a++) {
          _0x201a2f.find('.media-item[data-media-id=' + _0x1e695a[_0x514b7a] + ']').remove();
        }
        _0x4a3a32('.mvp-media-all').prop("checked", false);
      }
      _0x1b9cbe();
    }).fail(function (_0x4d519f, _0x2b127f, _0x204801) {
      console.log(_0x4d519f.responseText, _0x2b127f, _0x204801);
      _0x1294db.hide();
    });
  }
  _0x18c399.on('click', ".mvp-edit-media", function () {
    var _0xcecd67 = _0x4a3a32(this).closest('.media-item').attr("data-media-id");
    _0x1294db.show();
    var _0x150012 = [{
      'name': "action",
      'value': 'mvp_edit_media'
    }, {
      'name': 'media_id',
      'value': _0xcecd67
    }, {
      'name': 'security',
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x150012,
      'dataType': "json"
    }).done(function (_0x1634d2) {
      console.log(_0x1634d2);
      _0x231a39 = _0x1634d2;
      _0x1294db.hide();
      _0x342f9a("edit", _0x1634d2);
      _0x38cbb5 = "edit_media";
      _0x1646bb = _0xcecd67;
      _0x3b5533();
    }).fail(function (_0x16ffac, _0x149824, _0x459c7d) {
      console.log(_0x16ffac.responseText, _0x149824, _0x459c7d);
      _0x1294db.hide();
    });
    return false;
  });
  var _0x7f41e9;
  var _0x263ffa = _0x4a3a32("#playlist-selector-wrap");
  var _0x2edf23 = _0x4a3a32("#playlist_selector");
  _0x4a3a32('#mvp_playlist_action_do').on("click", function () {
    if (_0x201a2f.find('.mvp-media-indiv').length == 0x0) {
      return false;
    }
    var _0x4e934d = _0x201a2f.find(".mvp-media-indiv:checked");
    if (_0x4e934d.length == 0x0) {
      alert(_0x571282.attr("data-media-selected"));
      return false;
    }
    var _0x264a74 = _0x4a3a32("#mvp_playlist_action").val();
    if (_0x264a74 == "mvp-copy-media") {
      _0x7f41e9 = 'copy';
      _0x263ffa.find("option[value=" + _0x29ee86 + ']').show();
      _0x2edf23.prop('selectedIndex', 0x0);
      _0x263ffa.css("display", "block");
    } else {
      if (_0x264a74 == 'mvp-move-media') {
        _0x7f41e9 = "move";
        _0x263ffa.find('option[value=' + _0x29ee86 + ']').prop("selected", false).hide();
        _0x2edf23.prop("selectedIndex", 0x0);
        _0x263ffa.css('display', "block");
      } else {
        if (_0x264a74 == "mvp-delete-media") {
          var _0x2505a8 = confirm(_0x571282.attr('data-sure-to-delete'));
          if (_0x2505a8) {
            _0x1294db.show();
            var _0x1a071f = [];
            _0x4e934d.each(function () {
              _0x1a071f.push(parseInt(_0x4a3a32(this).closest(".media-item").attr('data-media-id'), 0xa));
            });
            _0x32d93a(_0x1a071f);
          }
        } else {
          if (_0x264a74 == "mvp-deactivate-media" || _0x264a74 == 'mvp-activate-media') {
            _0x1294db.show();
            var _0x1a071f = [];
            var _0x3fdc98 = _0x264a74 == "mvp-deactivate-media" ? '1' : '0';
            _0x4e934d.each(function () {
              var _0x301b95 = _0x4a3a32(this).closest('.media-item');
              _0x1a071f.push(parseInt(_0x301b95.attr("data-media-id"), 0xa));
              if (_0x264a74 == "mvp-deactivate-media") {
                _0x301b95.addClass("mvp-item-disabled");
              } else {
                _0x301b95.removeClass("mvp-item-disabled");
              }
            });
            var _0x33576a = [{
              'name': "action",
              'value': "mvp_set_disabled_all"
            }, {
              'name': 'disabled',
              'value': _0x3fdc98
            }, {
              'name': "media_id",
              'value': _0x1a071f
            }, {
              'name': "security",
              'value': mvp_data.security
            }];
            _0x4a3a32.ajax({
              'url': mvp_data.ajax_url,
              'type': "post",
              'data': _0x33576a,
              'dataType': "json"
            }).done(function (_0x3dea00) {
              console.log(_0x3dea00);
              _0x1294db.hide();
            }).fail(function (_0x2bac9c, _0x50e63a, _0x4c0efe) {
              console.log(_0x2bac9c.responseText, _0x50e63a, _0x4c0efe);
              _0x1294db.hide();
            });
          }
        }
      }
    }
  });
  _0x4a3a32("#selected-ok").on("click", function () {
    var _0xd80f45 = confirm("Are you sure to " + _0x7f41e9 + " selected media?");
    if (_0xd80f45) {
      _0x1294db.show();
      var _0x115e4c = [];
      var _0x33b1ed = _0x201a2f.find(".mvp-media-indiv:checked");
      _0x33b1ed.each(function () {
        _0x115e4c.push(parseInt(_0x4a3a32(this).closest(".media-item").attr("data-media-id"), 0xa));
      });
      var _0x3630c4 = _0x7f41e9 == 'copy' ? "mvp_copy_media" : "mvp_move_media";
      var _0x59a802 = [{
        'name': "action",
        'value': _0x3630c4
      }, {
        'name': "destination_playlist_id",
        'value': _0x2edf23.find("option:selected").attr("value")
      }, {
        'name': "media_id",
        'value': _0x115e4c
      }, {
        'name': "security",
        'value': mvp_data.security
      }];
      _0x4a3a32.ajax({
        'url': mvp_data.ajax_url,
        'type': "post",
        'data': _0x59a802,
        'dataType': 'json'
      }).done(function (_0x2c1809) {
        _0x1294db.hide();
        if (_0x2c1809 == "SUCCESS") {
          if (_0x7f41e9 == "move") {
            _0x33b1ed.closest(".media-item").remove();
            _0x4a3a32(".mvp-media-all").prop("checked", false);
          }
        }
        _0x1b9cbe();
      }).fail(function (_0x15b819, _0x95e5a6, _0x3da59e) {
        console.log(_0x15b819.responseText, _0x95e5a6, _0x3da59e);
        _0x1294db.hide();
      });
    }
  });
  _0x4a3a32('#selected-cancel').on("click", function () {
    _0x263ffa.css("display", 'none');
  });
  var _0x468488;
  var _0x132fee = [];
  var _0x406297;
  var _0x1b216f;
  function _0x4c6f78() {
    if (typeof MVPYoutubeLoader === "undefined") {
      var _0x2ff3f2 = document.createElement("script");
      _0x2ff3f2.type = "text/javascript";
      _0x2ff3f2.src = mvp_data.plugins_url + '/source/js/youtubeLoader.js';
      _0x2ff3f2.onload = _0x2ff3f2.onreadystatechange = function () {
        if (!this.readyState || this.readyState == 'complete') {
          _0x4c6f78();
        }
      };
      _0x2ff3f2.onerror = function () {
        console.log("Error loading " + this.src);
      };
      var _0x3cefad = document.getElementsByTagName('script')[0x0];
      _0x3cefad.parentNode.insertBefore(_0x2ff3f2, _0x3cefad);
      return;
    }
    var _0x1fc8be = {
      'youtubeAppId': mvp_data.options.youtube_id,
      'playlistItemContent': 'date,thumb,duration'
    };
    _0x468488 = new MVPYoutubeLoader(_0x1fc8be);
    _0x4a3a32(_0x468488).on("MVPYoutubeLoader.END_LOAD", function (_0x10757a, _0x28d7cc) {
      var _0xa0604 = {};
      if (!(_0x2fa6e8.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0xa0604.lock_time = _0x2fa6e8.val();
      }
      if (!(_0x4f5562.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0xa0604.playback_rate = _0x4f5562.val();
      }
      if (!(_0x2fc0c1.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0xa0604.end_link = _0x2fc0c1.val().replace(/"/g, "'");
        _0xa0604.end_target = _0x70d6dd.val();
      }
      if (!(_0x3358e6.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0xa0604.pwd = _0x3358e6.val().replace(/"/g, "'");
      }
      var _0x40988e;
      var _0x39a48e = _0x28d7cc.data.length;
      var _0x237d13;
      for (_0x40988e = 0x0; _0x40988e < _0x39a48e; _0x40988e++) {
        _0x237d13 = _0x28d7cc.data[_0x40988e];
        _0x237d13.type = 'youtube_single';
        _0x237d13.noapi = '1';
        if (_0xa0604.lock_time) {
          _0x237d13.lock_time = _0xa0604.lock_time;
        }
        if (_0xa0604.playback_rate) {
          _0x237d13.playback_rate = _0xa0604.playback_rate;
        }
        if (_0xa0604.end_link) {
          _0x237d13.end_link = _0xa0604.end_link;
          _0x237d13.end_target = _0xa0604.end_target;
        }
        if (_0xa0604.pwd) {
          _0x237d13.pwd = _0xa0604.pwd;
        }
        if (_0x237d13.thumbnails) {
          if (_0x237d13.thumbnails.medium) {
            _0x237d13.thumb = _0x237d13.thumbnails.medium.url;
          } else {
            if (_0x237d13.thumbnails.high) {
              _0x237d13.thumb = _0x237d13.thumbnails.high.url;
            } else {
              if (_0x237d13.thumbnails.standard) {
                _0x237d13.thumb = _0x237d13.thumbnails.standard.url;
              }
            }
          }
        }
        _0x132fee.push(_0x237d13);
      }
      console.log(_0x132fee, _0x268909);
      if (!_0x268909) {
        _0x3f9ab7();
      } else {
        _0x4dbbb1();
      }
    });
  }
  function _0x304d27(_0x552460, _0x398154, _0x15955f) {
    _0x1294db.show();
    if (!_0x468488) {
      _0x4c6f78();
    }
    var _0x21ae1b = setInterval(function () {
      if (_0x468488) {
        clearInterval(_0x21ae1b);
        var _0xa1234e = {
          "limit": _0x552460 || 0x3e8,
          "path": _0x398154,
          "type": _0x15955f
        };
        _0x468488.setData(_0xa1234e);
      }
    }, 0x64);
  }
  var _0x268909;
  var _0x111167 = _0x4a3a32("#mvp-update-playlist").on("click", function () {
    var _0xda139b = _0x571282.attr("data-number-of-video-to-retrieve");
    return _0x3d2bda(_0xda139b, _0x4a3a32(this));
  });
  function _0x3d2bda(_0x4bf019, _0xb6bf7) {
    var _0x33a6d6 = prompt(_0x4bf019);
    if (_0x33a6d6 == null) {
      return false;
    } else {
      if (_0x33a6d6.replace(/^\s+|\s+$/g, '').length == 0x0) {
        _0x3d2bda(_0x4bf019, _0xb6bf7);
      } else {
        if (!/^-?\d+$/.test(_0x33a6d6)) {
          _0x3d2bda(_0x4bf019, _0xb6bf7);
        } else {
          if (_0x33a6d6 == 0x0) {
            return;
          }
          if (_0x268909) {
            return false;
          }
          _0x268909 = true;
          _0x132fee = [];
          var _0x2972a = _0x4a3a32("#youtubeUrlType").val();
          var _0x2e26b0 = _0x4a3a32('#youtubeUrl').val();
          if (_0x2e26b0 && _0x2972a) {
            if (_0x2972a == "youtube_playlist") {
              _0x304d27(_0x33a6d6, _0x2e26b0, _0x2972a);
            } else if (_0x2972a == "youtube_channel") {
              _0x304d27(_0x33a6d6, _0x2e26b0, _0x2972a);
            }
          }
        }
      }
    }
  }
  function _0x4dbbb1() {
    var _0x5b3709 = [];
    var _0x405e0a = [];
    _0x201a2f.find(".media-item").each(function () {
      _0x5b3709.push(_0x4a3a32(this).find(".media-path").text());
      _0x405e0a.push(_0x4a3a32(this).find(".media-id").text());
    });
    console.log(_0x5b3709);
    var _0x19bb3b = [];
    var _0x13e1be = [];
    var _0x47efa9;
    var _0x1858d0 = _0x132fee.length;
    var _0x31149a;
    for (_0x47efa9 = 0x0; _0x47efa9 < _0x1858d0; _0x47efa9++) {
      _0x31149a = _0x132fee[_0x47efa9];
      if (_0x5b3709.length) {
        var _0x320069 = _0x5b3709.indexOf(_0x31149a.path);
        if (_0x320069 > -0x1) {
          _0x19bb3b.push({
            'id': _0x405e0a[_0x320069],
            'data': _0x31149a
          });
          _0x13e1be.push(_0x47efa9);
          _0x5b3709.splice(_0x320069, 0x1);
          _0x405e0a.splice(_0x320069, 0x1);
        }
      }
    }
    if (_0x13e1be.length) {
      _0x1858d0 = _0x13e1be.length;
      for (_0x47efa9 = _0x1858d0 - 0x1; _0x47efa9 >= 0x0; _0x47efa9--) {
        _0x132fee.splice(_0x13e1be[_0x47efa9], 0x1);
      }
    }
    _0x3f9ab7();
  }
  var _0x433e8c = _0x4a3a32("#mvp-edit-media-form");
  var _0x3ab7a1;
  var _0x38cbb5;
  var _0x1646bb;
  var _0x2d45fc = {};
  var _0x3c014c = _0x4a3a32("#mvp-edit-media-modal");
  var _0x391656 = _0x3c014c.find(".mvp-modal-bg").on("click", function (_0x5e7184) {
    if (_0x5e7184.target == this) {
      _0x2ca600();
    }
  });
  _0x4a3a32('#mvp-edit-media-form-cancel').on("click", function (_0x3022a1) {
    _0x2ca600();
  });
  _0x4a3a32("#mvp-edit-media-form-submit, #mvp-edit-media-form-submit2").on('click', function (_0x41e1a2) {
    if (_0x3ab7a1) {
      return false;
    }
    _0x3ab7a1 = true;
    if (_0x4a3a32(this).hasClass("mvp-edit-playlist-mode")) {
      var _0x4563c6;
      var _0x2fd90a;
      var _0x2f5d89;
      _0xb62561.find('.mvp-tab-content').each(function () {
        _0x2fd90a = _0x4a3a32(this);
        _0x2fd90a.find("input[ap-required=true]").each(function () {
          var _0x302878 = _0x4a3a32(this);
          if (_0x302878.val() == '') {
            if (!_0x2f5d89) {
              _0x2f5d89 = _0x302878;
            }
            _0x302878.addClass("aprf");
            if (!_0x4563c6) {
              _0x4563c6 = _0x2fd90a.attr('id');
              _0x4563c6 = _0x4563c6.substr(0x0, _0x4563c6.length - 0x8);
            }
            if (_0x4563c6 == "mvp-tab-media-adverts") {
              _0x302878.closest(".option-tab.mvp-ad-source").removeClass('option-closed');
            }
            if (_0x4563c6 == "mvp-tab-media-annotations") {
              _0x302878.closest(".option-tab.mvp-annotation-source").removeClass("option-closed");
            }
          } else {
            _0x302878.removeClass("aprf");
          }
        });
      });
      if (_0x4563c6) {
        _0xb62561.find(_0x4a3a32('#' + _0x4563c6)).click();
        _0x3ab7a1 = false;
        _0x2f5d89[0x0].scrollIntoView({
          'behavior': "smooth",
          'block': 'center'
        });
        _0x2f5d89 = null;
        alert(_0x571282.attr("data-fill-required-fields"));
        return false;
      }
    } else {
      if (_0x4a3a32(this).hasClass('mvp-get-video-shortcode-mode')) {
        var _0x4563c6;
        var _0x2f5d89;
        _0x283b9f.find("input[ap-required=true]").each(function () {
          var _0x53f897 = _0x4a3a32(this);
          if (_0x53f897.val() == '') {
            _0x4563c6 = true;
            if (!_0x2f5d89) {
              _0x2f5d89 = _0x53f897;
            }
            _0x53f897.addClass("aprf");
          } else {
            _0x53f897.removeClass("aprf");
          }
        });
        if (_0x4563c6) {
          _0x3ab7a1 = false;
          _0x4a3a32("#mvp-quick-sh-tab-video").trigger("click");
          _0x2f5d89[0x0].scrollIntoView({
            'behavior': "smooth",
            'block': "center"
          });
          _0x2f5d89 = null;
          alert(_0x571282.attr("data-fill-required-fields"));
          return false;
        }
        var _0x2f101c;
        _0x4a3a32("#mvp-tab-shortcode-adverts-content").find("input[ap-required=true]").each(function () {
          _0x2f101c = _0x4a3a32(this);
          if (_0x2f101c.val() == '') {
            _0x4563c6 = true;
            if (!_0x2f5d89) {
              _0x2f5d89 = _0x2f101c;
            }
            _0x2f101c.addClass("aprf");
          } else {
            _0x2f101c.removeClass('aprf');
          }
        });
        if (_0x4563c6) {
          _0x3ab7a1 = false;
          _0x4a3a32("#mvp-quick-sh-tab-adverts").trigger("click");
          _0x2f101c.closest(".option-tab.mvp-ad-source").removeClass("option-closed");
          _0x2f5d89[0x0].scrollIntoView({
            'behavior': "smooth",
            'block': "center"
          });
          _0x2f5d89 = null;
          alert(_0x571282.attr("data-fill-required-fields"));
          return false;
        }
      }
    }
    if (_0x538222 == 'youtube_playlist_backend' || _0x538222 == 'youtube_channel_backend') {
      _0x132fee = [];
      _0x406297 = _0x3dccd5.val();
      if (_0x538222 == "youtube_playlist_backend") {
        _0x1b216f = 'youtube_playlist';
      } else {
        if (_0x538222 == "youtube_channel_backend") {
          _0x1b216f = "youtube_channel";
        }
      }
      _0x4a3a32("#youtubeUrlType").val(_0x1b216f);
      _0x4a3a32('#youtubeUrl').val(_0x406297);
      _0x111167.removeClass("mvp-update-playlist-hidden");
      _0x4c9ce1.remove();
      _0x304d27(_0x3b107e.val(), _0x406297, _0x1b216f);
      _0x3c014c.css("display", "none");
      _0x1294db.show();
      return false;
    }
    _0x2d45fc = {};
    var _0xd28f74 = {};
    var _0x301739 = "[apmvp_video type=\"" + _0x538222 + "\"";
    var _0x55fae2 = _0x4bfff2.val().replace(/"/g, "'");
    if (_0x55fae2) {
      _0x301739 += " title=\"" + _0x55fae2 + "\"";
    }
    _0x2d45fc.title = _0x55fae2;
    _0xd28f74.disabled = _0x30a47e.val() == '1' ? '1' : '0';
    _0xd28f74.type = _0x538222;
    if (_0x538222 == 'video' || _0x538222 == 'audio') {
      var _0x24cec5 = [];
      var _0x5a755c = '';
      var _0x236c46 = '';
      var _0x56f5ff;
      var _0x13bd2c;
      _0x3c014c.find(".multi_path_section").each(function () {
        var _0x4925a2 = _0x4a3a32(this);
        var _0x508e57 = {
          path: _0x4925a2.find('.multi_path').val().replace(/"/g, "'")
        };
        if (!_0x2d45fc.path) {
          _0x2d45fc.path = _0x508e57.path;
        }
        var _0x44a6b8 = _0x4925a2.find('.quality_title').val().replace(/"/g, "'");
        _0x508e57.quality_title = _0x44a6b8;
        if (_0x4925a2.find('.quality_default').is(":checked")) {
          _0x508e57.def = _0x44a6b8;
          _0x56f5ff = _0x44a6b8;
        } else {
          _0x508e57.def = '';
        }
        if (_0x4925a2.find('.quality_mobile_default').is(":checked")) {
          _0x508e57.defMobile = _0x44a6b8;
          _0x13bd2c = _0x44a6b8;
        }
        _0x5a755c += _0x508e57.path + ',';
        _0x236c46 += _0x508e57.quality_title + ',';
        _0x24cec5.push(_0x508e57);
      });
      _0x5a755c = _0x5a755c.substr(0x0, _0x5a755c.length - 0x1);
      _0x301739 += " path=\"" + _0x5a755c + "\"";
      _0x236c46 = _0x236c46.substr(0x0, _0x236c46.length - 0x1);
      _0x301739 += " quality_title=\"" + _0x236c46 + "\"";
      if (_0x56f5ff) {
        _0x301739 += " quality=\"" + _0x56f5ff + "\"";
      }
      if (_0x13bd2c) {
        _0x301739 += " quality_mobile=\"" + _0x13bd2c + "\"";
      }
      var _0x34d426 = _0x24cec5;
    } else {
      var _0x24cec5 = [];
      var _0x59966f = {};
      _0x59966f.path = _0x3dccd5.val().replace(/"/g, "'");
      _0x301739 += " path=\"" + _0x59966f.path + "\"";
      _0x2d45fc.path = _0x59966f.path;
      if (!(_0xa46672.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x59966f.mp4 = _0xa46672.val().replace(/"/g, "'");
      }
      _0x24cec5.push(_0x59966f);
      var _0x34d426 = _0x24cec5;
    }
    if (_0x538222 == "folder_video" || _0x538222 == "folder_audio" || _0x538222 == "folder_image") {
      _0xd28f74.folder_sort = _0x2b443e.val();
      _0xd28f74.id3 = _0xeeef9d.val();
      _0x301739 += " folder_sort=\"" + _0xd28f74.folder_sort + "\"";
      if (_0xd28f74.id3 && _0xd28f74.id3 == '1') {
        _0x301739 += " id3=\"" + _0xd28f74.id3 + "\"";
      }
      _0xd28f74.folder_custom_url = _0x1fa62a.is(':checked');
      if (_0xd28f74.folder_custom_url == '1') {
        _0x301739 += " folder_custom_url=\"" + _0xd28f74.folder_custom_url + "\"";
      }
    }
    if (!(_0x30b799.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.user_id = _0x30b799.val().replace(/"/g, "'");
      if (_0xd28f74.user_id) {
        _0x301739 += " user_id=\"" + _0xd28f74.user_id + "\"";
      }
    }
    if (_0x538222 == 'youtube_video_query' || _0x538222 == "youtube_channel") {
      _0xd28f74.sort_type = _0x5b7d8e.val();
    } else {
      if (_0x538222 == 'vimeo_channel') {
        _0xd28f74.sort_type = _0x337c00.val();
      } else {
        if (_0x538222 == "vimeo_user_album" || _0x538222 == "vimeo_album") {
          _0xd28f74.sort_type = _0x1de2dc.val();
        } else {
          if (_0x538222 == "vimeo_group") {
            _0xd28f74.sort_type = _0x303e4e.val();
          } else {
            if (_0x538222 == "vimeo_ondemand") {
              _0xd28f74.sort_type = _0x546dfb.val();
            } else {
              if (_0x538222 == "vimeo_folder") {
                _0xd28f74.sort_type = _0x3545ac.val();
              }
            }
          }
        }
      }
    }
    if (_0xd28f74.sort_type) {
      _0x301739 += " sort_type=\"" + _0xd28f74.sort_type + "\"";
    }
    if (_0x538222 == "vimeo_channel" || _0x538222 == "vimeo_user_album" || _0x538222 == 'vimeo_album' || _0x538222 == "vimeo_group" || _0x538222 == "vimeo_ondemand" || _0x538222 == 'vimeo_folder') {
      _0xd28f74.vimeo_sort_dir = _0x3dacf3.val();
      if (_0xd28f74.vimeo_sort_dir) {
        _0x301739 += " vimeo_sort_dir=\"" + _0xd28f74.vimeo_sort_dir + "\"";
      }
    }
    if (_0xa2ef62.css("display") != "none") {
      if (!(_0x3b107e.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0xd28f74.limit = _0x3b107e.val();
        if (_0xd28f74.limit) {
          _0x301739 += " limit=\"" + _0xd28f74.limit + "\"";
        }
      }
    }
    if (_0x44de76.css("display") != "none") {
      if (_0x329615.val() == '1') {
        _0xd28f74.load_more = _0x329615.val();
        _0x301739 += " load_more=\"1\"";
      }
    }
    if (_0x29d466.css('display') != 'none') {
      if (!(_0x1f292f.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0xd28f74.gdrive_sort = _0x1f292f.val();
        if (_0xd28f74.gdrive_sort) {
          _0x301739 += " gdrive_sort=\"" + _0xd28f74.gdrive_sort + "\"";
        }
      }
    }
    if (_0x296dbb.css('display') != "none") {
      if (!(_0x40a10b.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0xd28f74.onedrive_sort = _0x40a10b.val();
        if (_0xd28f74.onedrive_sort) {
          _0x301739 += " onedrive_sort=\"" + _0xd28f74.onedrive_sort + "\"";
        }
      }
    }
    if (!(_0x2da2e5.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.exclude = _0x2da2e5.val().replace(/"/g, "'");
      if (_0xd28f74.exclude) {
        _0x301739 += " exclude=\"" + _0xd28f74.exclude + "\"";
      }
    }
    if (!(_0x524c4a.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.bkey = _0x524c4a.val().replace(/"/g, "'");
      if (_0xd28f74.bkey) {
        _0x301739 += " bkey=\"" + _0xd28f74.bkey + "\"";
      }
    }
    if (_0x185899.val() == '1') {
      _0xd28f74.is360 = _0x185899.val();
      _0xd28f74.vrMode = _0x12a49e.val();
      _0x301739 += " is360=\"" + _0xd28f74.is360 + "\"";
      if (_0x12a49e.val()) {
        _0x301739 += " vrMode=\"" + _0xd28f74.vrMode + "\"";
      }
    }
    if (_0x28e887.val() == '1') {
      _0xd28f74.noapi = _0x28e887.val();
      if (_0xd28f74.noapi) {
        _0x301739 += " noapi=\"" + _0xd28f74.noapi + "\"";
      }
    }
    if (_0xbc030c.val() == '1') {
      _0xd28f74.islive = _0xbc030c.val();
      if (_0xd28f74.islive) {
        _0x301739 += " islive=\"" + _0xd28f74.islive + "\"";
      }
    }
    if (!(_0x2fa6e8.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.lock_time = _0x2fa6e8.val();
      if (_0xd28f74.lock_time) {
        _0x301739 += " lock_time=\"" + _0xd28f74.lock_time + "\"";
      }
    }
    if (!(_0x5a1ea2.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.vimeo_account_type = _0x5a1ea2.val();
      if (_0xd28f74.vimeo_account_type) {
        _0x301739 += " vimeo_account_type=\"" + _0xd28f74.vimeo_account_type + "\"";
      }
    }
    if (!(_0x2df758.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.vimeo_upload_date = _0x2df758.val();
      if (_0xd28f74.vimeo_upload_date) {
        _0x301739 += " vimeo_upload_date=\"" + _0xd28f74.vimeo_upload_date + "\"";
      }
    }
    if (!(_0x443919.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.poster = _0x443919.val().replace(/"/g, "'");
      if (_0xd28f74.poster) {
        _0x301739 += " poster=\"" + _0xd28f74.poster + "\"";
      }
    }
    if (!(_0x326da3.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.slideshow_images = _0x326da3.val();
      if (_0xd28f74.slideshow_images) {
        _0x301739 += " slideshow_images=\"" + _0xd28f74.slideshow_images + "\"";
      }
    }
    if (!(_0x289ce6.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.poster_frame_time = _0x289ce6.val();
      if (_0xd28f74.video_frame_time) {
        _0x301739 += " video_frame_time=\"" + _0xd28f74.video_frame_time + "\"";
      }
    }
    if (!(_0x50d2e3.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.thumb = _0x50d2e3.val().replace(/"/g, "'");
      if (_0xd28f74.thumb) {
        _0x301739 += " thumb=\"" + _0xd28f74.thumb + "\"";
      }
    }
    _0x2d45fc.thumb = _0x50d2e3.val().replace(/"/g, "'");
    if (!(_0x28d090.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.alt_text = _0x28d090.val().replace(/"/g, "'");
      if (_0xd28f74.alt_text) {
        _0x301739 += " alt_text=\"" + _0xd28f74.alt_text + "\"";
      }
    }
    if (!(_0x1147d8.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.hover_preview = _0x1147d8.val().replace(/"/g, "'");
      if (_0xd28f74.hover_preview) {
        _0x301739 += " hover_preview=\"" + _0xd28f74.hover_preview + "\"";
      }
    }
    if (!(_0x5b62a1.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.description = _0x5b62a1.val().replace(/"/g, "'");
      if (_0xd28f74.description) {
        _0x301739 += " description=\"" + _0xd28f74.description + "\"";
      }
    }
    if (!(_0x3da10c.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.download = _0x3da10c.val().replace(/"/g, "'");
      if (_0xd28f74.download) {
        _0x301739 += " download=\"" + _0xd28f74.download + "\"";
      }
    }
    if (_0x1098fe.children().length > 0x0) {
      var _0xc1c2aa = [];
      var _0x59966f;
      _0x1098fe.find(".mvp-pi-table").each(function () {
        var _0x362ae5 = _0x4a3a32(this);
        _0x59966f = {};
        if (_0x362ae5.find(".mvp-pi-title").val()) {
          _0x59966f.title = _0x362ae5.find(".mvp-pi-title").val().replace(/"/g, "'");
        }
        if (_0x362ae5.find(".mvp-pi-url").val()) {
          _0x59966f.url = _0x362ae5.find(".mvp-pi-url").val().replace(/"/g, "'");
          _0x59966f.target = _0x362ae5.find('.mvp-pi-target').val();
        }
        if (_0x362ae5.find(".mvp-pi-rel").val()) {
          _0x59966f.rel = _0x362ae5.find(".mvp-pi-rel").val().replace(/"/g, "'");
        }
        if (_0x362ae5.find('.mvp-pi-class').val()) {
          _0x59966f["class"] = _0x362ae5.find(".mvp-pi-class").val().replace(/"/g, "'");
        }
        _0x59966f.icon = _0x362ae5.find('.mvp-pi-icon').val();
        _0xc1c2aa.push(_0x59966f);
      });
      _0xd28f74.pi_icons = _0xc1c2aa;
    }
    if (!(_0x41bf1a.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.start = _0x41bf1a.val();
      if (_0xd28f74.start) {
        _0x301739 += " start=\"" + _0xd28f74.start + "\"";
      }
    }
    if (!(_0x4d9556.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.end = _0x4d9556.val();
      if (_0xd28f74.end) {
        _0x301739 += " end=\"" + _0xd28f74.end + "\"";
      }
    }
    if (!(_0x4f5562.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.playback_rate = _0x4f5562.val();
      if (_0xd28f74.playback_rate && _0x4f5562 != '1') {
        _0x301739 += " playback_rate=\"" + _0xd28f74.playback_rate + "\"";
      }
    }
    if (!(_0x287453.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.preview_seek = _0x287453.val().replace(/"/g, "'");
      if (_0xd28f74.preview_seek) {
        _0x301739 += " preview_seek=\"" + _0xd28f74.preview_seek + "\"";
      }
    }
    if (!(_0x627d74.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.chapters = _0x627d74.val().replace(/"/g, "'");
      if (_0xd28f74.chapters) {
        _0x301739 += " chapters=\"" + _0xd28f74.chapters + "\"";
      }
      if (_0x48717e.is(':checked')) {
        _0xd28f74.chapters_cors = '1';
        if (_0xd28f74.chapters_cors) {
          _0x301739 += " chapters_cors=\"1\"";
        }
      }
    }
    if (!(_0x276d91.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.vast = _0x276d91.val().replace(/"/g, "'");
      if (_0xd28f74.vast) {
        _0x301739 += " vast=\"" + _0xd28f74.vast + "\"";
      }
    }
    if (!(_0x501b29.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.duration = _0x501b29.val();
      if (_0xd28f74.duration) {
        _0x301739 += " duration=\"" + _0xd28f74.duration + "\"";
      }
    }
    if (!(_0x327ff5.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.link = _0x327ff5.val().replace(/"/g, "'");
      _0xd28f74.target = _0x1c8ae6.val();
      if (_0xd28f74.link) {
        _0x301739 += " link=\"" + _0xd28f74.link + "\"";
        if (_0xd28f74.target) {
          _0x301739 += " target=\"" + _0xd28f74.target + "\"";
        }
      }
    }
    if (!(_0x2fc0c1.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.end_link = _0x2fc0c1.val().replace(/"/g, "'");
      _0xd28f74.end_target = _0x70d6dd.val();
      if (_0xd28f74.end_link) {
        _0x301739 += " end_link=\"" + _0xd28f74.end_link + "\"";
        if (_0xd28f74.end_target) {
          _0x301739 += " end_target=\"" + _0xd28f74.end_target + "\"";
        }
      }
    }
    if (!(_0x3358e6.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.pwd = _0x3358e6.val().replace(/"/g, "'");
    }
    if (!(_0x5beb05.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.vpwd = _0x5beb05.val().replace(/"/g, "'");
      if (_0xd28f74.vpwd) {
        _0x301739 += " vpwd=\"" + _0xd28f74.vpwd + "\"";
      }
    }
    if (_0x5d923b.val() && !(_0x5d923b.val().replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0xd28f74.age_verify = _0x5d923b.val().replace(/"/g, "'");
      if (_0xd28f74.age_verify) {
        _0x301739 += " age_verify=\"" + _0xd28f74.age_verify + "\"";
      }
    }
    var _0x474b08 = _0x38792b.find('#width').val();
    var _0x4bd7e9 = _0x38792b.find("#height").val();
    if (_0x474b08) {
      _0xd28f74.width = _0x474b08;
      _0x301739 += " width=\"" + _0x474b08 + "\"";
    }
    if (_0x4bd7e9) {
      _0xd28f74.height = _0x4bd7e9;
      _0x301739 += " height=\"" + _0x4bd7e9 + "\"";
    }
    var _0x24cec5 = [];
    var _0x5748f3 = '';
    var _0x4663dc = '';
    var _0x143fb2 = '';
    var _0x1c0a68;
    _0x3c014c.find(".subtitle_section").each(function () {
      var _0x274bcb = _0x4a3a32(this);
      var _0x4a256f = {
        src: _0x274bcb.find(".subtitle_src").val().replace(/"/g, "'")
      };
      var _0x51c65c = _0x274bcb.find(".subtitle_label").val().replace(/"/g, "'");
      _0x4a256f.label = _0x51c65c;
      if (_0x274bcb.find(".subtitle_default").is(':checked')) {
        _0x4a256f.def = _0x51c65c;
        _0x1c0a68 = _0x51c65c;
      } else {
        _0x4a256f.def = '';
      }
      if (_0x274bcb.find(".subtitle_cors").is(':checked')) {
        _0x4a256f.cors = '1';
      } else {
        _0x4a256f.cors = '';
      }
      _0x5748f3 += _0x4a256f.src + ',';
      _0x4663dc += _0x4a256f.label + ',';
      if (!(_0x4a256f.cors.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x143fb2 += _0x4a256f.cors + ',';
      }
      _0x24cec5.push(_0x4a256f);
    });
    if (_0x5748f3.length > 0x1) {
      _0x5748f3 = _0x5748f3.substr(0x0, _0x5748f3.length - 0x1);
      _0x301739 += " subtitle_src=\"" + _0x5748f3 + "\"";
      _0x4663dc = _0x4663dc.substr(0x0, _0x4663dc.length - 0x1);
      _0x301739 += " subtitle_label=\"" + _0x4663dc + "\"";
      _0x143fb2 = _0x143fb2.substr(0x0, _0x143fb2.length - 0x1);
      if (!(_0x143fb2.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x301739 += " subtitle_cors=\"" + _0x143fb2 + "\"";
      }
      if (_0x1c0a68) {
        _0x301739 += " subtitle_active=\"" + _0x1c0a68 + "\"";
      }
    }
    var _0x559aee = _0x24cec5;
    var _0x2966f5 = _0x44c7dc();
    var _0x359c9f = _0x60fd9e();
    _0xd28f74.randomizeAdPre = _0x59ea90.val();
    _0xd28f74.randomizeAdEnd = _0x21e11f.val();
    if (_0x4a3a32(this).hasClass("mvp-edit-playlist-mode")) {
      var _0x4672be = '';
      if (_0x38cbb5 == "edit_media") {
        _0x4672be = _0x1646bb;
        _0x2d45fc.media_id = _0x4672be;
      }
      _0x2ca600();
      _0x1294db.show();
      var _0x18cc0d = [{
        'name': "action",
        'value': "mvp_add_media"
      }, {
        'name': "save_type",
        'value': _0x38cbb5
      }, {
        'name': "media_id",
        'value': _0x4672be
      }, {
        'name': "playlist_id",
        'value': _0x4a3a32(".mvp-admin").attr('data-playlist-id')
      }, {
        'name': "type",
        'value': _0x538222
      }, {
        'name': "title",
        'value': _0x55fae2
      }, {
        'name': "options",
        'value': JSON.stringify(_0xd28f74)
      }, {
        'name': "media_path",
        'value': JSON.stringify(_0x34d426)
      }, {
        'name': "subtitle_src",
        'value': _0x559aee.length ? JSON.stringify(_0x559aee) : ''
      }, {
        'name': "ad_pre",
        'value': _0x2966f5[0x0].length ? JSON.stringify(_0x2966f5[0x0]) : ''
      }, {
        'name': 'ad_mid',
        'value': _0x2966f5[0x1].length ? JSON.stringify(_0x2966f5[0x1]) : ''
      }, {
        'name': "ad_end",
        'value': _0x2966f5[0x2].length ? JSON.stringify(_0x2966f5[0x2]) : ''
      }, {
        'name': "annotation",
        'value': _0x359c9f.length ? JSON.stringify(_0x359c9f) : ''
      }, {
        'name': "security",
        'value': mvp_data.security
      }];
      if (_0x38cbb5 == "add_media") {
        _0x18cc0d.push({
          'name': "additional_playlist",
          'value': _0x5742a6.val()
        });
      }
      _0x4a3a32.ajax({
        'url': mvp_data.ajax_url,
        'type': "post",
        'data': _0x18cc0d,
        'dataType': "json"
      }).done(function (_0x425146) {
        if (_0x38cbb5 == "add_media") {
          var _0x5c3494 = parseInt(_0x425146.order_id, 0xa);
          var _0x56714b = _0x425146.insert_id;
          var _0x520bee = _0x4a3a32(".mvp-media-item-container-orig").clone().removeClass("mvp-media-item-container-orig").addClass("media-item mvp-pagination-hidden").attr("data-media-id", _0x56714b).attr("data-order-id", _0x5c3494);
          _0x520bee.find(".media-id").html(_0x56714b);
          _0x520bee.find(".media-type").html(_0xd28f74.type);
          var _0x427179 = _0x2d45fc.thumb ? _0x2d45fc.thumb : "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D";
          _0x520bee.find(".mvp-media-thumb-img").attr('src', _0x427179);
          _0x520bee.find('.media-title').html(_0x2d45fc.title);
          _0x520bee.find(".media-path").html(_0x2d45fc.path);
          var _0x4d2d60 = _0x201a2f.find(".media-item").length;
          if (_0x4d2d60 == 0x0) {
            _0x201a2f.append(_0x520bee);
          } else {
            var _0x1cf6a9 = true;
            _0x201a2f.find(".media-item").each(function () {
              var _0x1342d6 = parseInt(_0x4a3a32(this).attr("data-order-id"), 0xa);
              if (_0x5c3494 < _0x1342d6) {
                if (_0x1cf6a9) {
                  _0x4a3a32(this).before(_0x520bee);
                  _0x1cf6a9 = false;
                  return false;
                }
              }
            });
            if (_0x1cf6a9) {
              _0x201a2f.append(_0x520bee);
            }
          }
          _0x1b9cbe(true);
        } else {
          if (_0x38cbb5 == "edit_media") {
            var _0xf8896e = _0x201a2f.find(".media-item[data-media-id=\"" + _0x2d45fc.media_id + "\"]");
            var _0x427179 = _0x2d45fc.thumb ? _0x2d45fc.thumb : "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D";
            _0xf8896e.find(".mvp-media-thumb-img").attr("src", _0x427179);
            _0xf8896e.find(".media-title").html(_0x2d45fc.title);
            _0xf8896e.find('.media-path').html(_0x2d45fc.path);
          }
        }
        _0x1294db.hide();
        _0x3ab7a1 = false;
      }).fail(function (_0x3fc822, _0x5a238e, _0xb7d638) {
        console.log(_0x3fc822.responseText, _0x5a238e, _0xb7d638);
        _0x1294db.hide();
        _0x3ab7a1 = false;
      });
    } else {
      if (_0x4a3a32(this).hasClass("mvp-get-video-shortcode-mode")) {
        var _0x13ebb0 = '';
        var _0x31a509 = _0x4a3a32("#mvp-tab-shortcode-adverts-content");
        _0x31a509.find(".mvp-ad-source.ad-pre").each(function () {
          var _0x132dd6 = _0x4a3a32(this);
          _0x13ebb0 += _0x39562b(_0x132dd6, "ad-pre");
        });
        _0x31a509.find(".mvp-ad-source.ad-mid").each(function () {
          var _0xfebfc = _0x4a3a32(this);
          _0x13ebb0 += _0x39562b(_0xfebfc, "ad-mid");
        });
        _0x31a509.find('.mvp-ad-source.ad-end').each(function () {
          var _0x55eb79 = _0x4a3a32(this);
          _0x13ebb0 += _0x39562b(_0x55eb79, "ad-end");
        });
        if (_0x4a3a32(this).attr('id') == "mvp-edit-media-form-submit2") {
          var _0x10bb6c = _0x4a3a32("#mvp-quick-video-shortcode-ta").val();
          if (_0x10bb6c.length == 0x0) {
            _0x3ab7a1 = false;
            _0x4a3a32("#mvp-edit-media-form-submit").click();
            return false;
          }
          var _0x2883df = _0x10bb6c.substr(0x0, _0x10bb6c.indexOf("[/apmvp]"));
          _0x301739 += ']';
          if (_0x13ebb0) {
            _0x301739 += _0x13ebb0;
          }
          _0x301739 += '[/apmvp_video]';
          var _0x417499 = _0x2883df + _0x301739 + "[/apmvp]";
        } else {
          if (_0x4a3a32(this).attr('id') == "mvp-edit-media-form-submit") {
            _0x301739 += ']';
            if (_0x13ebb0) {
              _0x301739 += _0x13ebb0;
            }
            _0x301739 += '[/apmvp_video]';
            var _0x508fc1 = _0x4a3a32("#mvp-quick-player-shortcode-form");
            var _0x4e2451;
            var _0x3486ae = {};
            var _0x31257d = _0x508fc1.find("input,select,textarea").serialize();
            _0x4a3a32.each(_0x31257d.split('&'), function (_0x25d530, _0x37c1cb) {
              var _0x201441 = _0x37c1cb.split('=');
              var _0x275e46 = _0x201441[0x0];
              var _0x197d5f = _0x201441[0x1];
              if (_0x275e46 == "playlistPosition") {
                _0x4e2451 = _0x197d5f;
              }
              _0x3486ae[_0x275e46] = _0x197d5f;
            });
            var _0x598317 = '';
            for (var [_0x249577, _0x30beb6] of Object.entries(_0x3486ae)) {
              o = _0x249577.split(/(?=[A-Z])/).join('_').toLowerCase();
              if (_0x4e2451 == "wall" || _0x4e2451 == 'outer') {
                if (o == "playlist_position" || o == "playlist_style" || o == "navigation_type") {
                  continue;
                }
              } else {
                if (o == "grid_type" || o == "playlist_grid_style") {
                  continue;
                }
              }
              _0x598317 += " " + o + "=\"" + _0x30beb6 + "\"";
            }
            if (_0x4e2451 == "wall" || _0x4e2451 == "outer") {
              _0x598317 += " active_item=\"-1\"";
            }
            var _0x2883df = '[apmvp' + _0x598317 + ']';
            var _0x417499 = _0x2883df + _0x301739 + "[/apmvp]";
          }
        }
        _0x4a3a32("#mvp-quick-video-shortcode-ta").val(_0x417499).select();
        document.execCommand("copy");
        if (_0x4a3a32('#mvp-meta-add-shortcode-to-editor').is(":checked")) {
          if (tinymce && tinymce.activeEditor) {
            tinymce.activeEditor.execCommand("mceInsertContent", false, _0x417499);
          }
        }
        _0x3ab7a1 = false;
        _0x4a3a32("#mvp-quick-video-shortcode-ta")[0x0].scrollIntoView({
          'behavior': "smooth",
          'block': "center"
        });
      }
    }
  });
  var _0x3f2dfc;
  function _0x3f9ab7() {
    var _0x9bf990 = _0x44c7dc();
    var _0x1ff986 = _0x60fd9e();
    var _0x478e0d = [{
      'name': "action",
      'value': 'mvp_add_media_multiple'
    }, {
      'name': "youtube_url",
      'value': _0x406297
    }, {
      'name': "youtube_url_type",
      'value': _0x1b216f
    }, {
      'name': 'playlist_id',
      'value': _0x4a3a32(".mvp-admin").attr("data-playlist-id")
    }, {
      'name': "media",
      'value': JSON.stringify(_0x132fee)
    }, {
      'name': "ad_pre",
      'value': _0x9bf990[0x0].length ? JSON.stringify(_0x9bf990[0x0]) : ''
    }, {
      'name': "ad_mid",
      'value': _0x9bf990[0x1].length ? JSON.stringify(_0x9bf990[0x1]) : ''
    }, {
      'name': 'ad_end',
      'value': _0x9bf990[0x2].length ? JSON.stringify(_0x9bf990[0x2]) : ''
    }, {
      'name': "annotation",
      'value': _0x1ff986.length ? JSON.stringify(_0x1ff986) : ''
    }, {
      'name': 'security',
      'value': mvp_data.security
    }];
    console.log(_0x478e0d);
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x478e0d,
      'dataType': "json"
    }).done(function (_0x3152d3) {
      console.log(_0x3152d3);
      var _0x2153b7;
      var _0x542fa1 = _0x3152d3.length;
      var _0x33d3ed;
      for (_0x2153b7 = 0x0; _0x2153b7 < _0x542fa1; _0x2153b7++) {
        _0x33d3ed = _0x3152d3[_0x2153b7];
        var _0x46385b = parseInt(_0x33d3ed.order_id, 0xa);
        var _0x2ddefa = _0x33d3ed.insert_id;
        var _0x5361f4 = _0x33d3ed.options;
        var _0x5479c2 = _0x4a3a32('.mvp-media-item-container-orig').clone().removeClass("mvp-media-item-container-orig").addClass("media-item mvp-pagination-hidden").attr('data-media-id', _0x2ddefa).attr("data-order-id", _0x46385b);
        _0x5479c2.find(".media-id").html(_0x2ddefa);
        _0x5479c2.find(".media-type").html(_0x5361f4.type);
        if (_0x5361f4.thumb) {
          _0x5479c2.find(".mvp-media-thumb-img").attr("src", _0x5361f4.thumb);
        }
        if (_0x5361f4.title) {
          _0x5479c2.find(".media-title").html(_0x5361f4.title);
        }
        _0x5479c2.find(".media-path").html(_0x5361f4.path);
        if (_0x3f2dfc) {
          _0x5479c2.insertAfter(_0x3f2dfc);
          _0x3f2dfc = _0x5479c2;
        } else {
          _0x201a2f.prepend(_0x5479c2);
          _0x3f2dfc = _0x5479c2;
        }
      }
      _0x3f2dfc = null;
      _0x1b9cbe(true);
      _0x2ca600();
      _0x1294db.hide();
      _0x3ab7a1 = false;
      _0x268909 = false;
    }).fail(function (_0x2111b2, _0x1d2bba, _0x34bf5f) {
      console.log(_0x2111b2.responseText, _0x1d2bba, _0x34bf5f);
      _0x1294db.hide();
      _0x3ab7a1 = false;
      _0x268909 = false;
    });
  }
  function _0x44c7dc() {
    var _0x52f5e5 = [];
    _0x3c014c.find(".mvp-ad-source.ad-pre").each(function () {
      var _0x365eeb = _0x4a3a32(this);
      _0x52f5e5.push(_0x301dab(_0x365eeb, "ad-pre"));
    });
    var _0x53396f = [];
    _0x3c014c.find(".mvp-ad-source.ad-mid").each(function () {
      var _0x59e1a9 = _0x4a3a32(this);
      _0x53396f.push(_0x301dab(_0x59e1a9, "ad-mid"));
    });
    var _0x34036a = [];
    _0x3c014c.find(".mvp-ad-source.ad-end").each(function () {
      var _0x38b276 = _0x4a3a32(this);
      _0x34036a.push(_0x301dab(_0x38b276, "ad-end"));
    });
    return [_0x52f5e5, _0x53396f, _0x34036a];
  }
  function _0x60fd9e() {
    var _0x36a7e0 = [];
    _0x3c014c.find(".mvp-annotation-source").each(function () {
      var _0x2fdbb4 = _0x4a3a32(this);
      var _0x1854f1 = {
        type: _0xd4e222
      };
      var _0xd4e222 = _0x2fdbb4.find(".annotation_type").val();
      if (_0xd4e222 == "adsense-detail") {
        var _0xcc4a5f = _0x2fdbb4.find('.annotation_adsense_client').val().replace(/"/g, "'");
        var _0x203c54 = _0x2fdbb4.find(".annotation_adsense_slot").val().replace(/"/g, "'");
        var _0x28ca5a = _0x2fdbb4.find(".annotation_width").val().replace(/"/g, "'");
        var _0x348c7e = _0x2fdbb4.find(".annotation_height").val().replace(/"/g, "'");
        if (_0xcc4a5f) {
          _0x1854f1.adsense_client = _0xcc4a5f;
        }
        if (_0x203c54) {
          _0x1854f1.adsense_slot = _0x203c54;
        }
        if (_0x28ca5a) {
          _0x1854f1.width = _0x28ca5a;
        }
        if (_0x348c7e) {
          _0x1854f1.height = _0x348c7e;
        }
      } else {
        _0x1854f1.path = _0x2fdbb4.find(".annotation_path").val().replace(/"/g, "'");
      }
      var _0x552aea = _0x2fdbb4.find(".annotation_show_time").val();
      if (!(_0x552aea.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x1854f1.show_time = _0x552aea;
      }
      var _0xfcf6 = _0x2fdbb4.find(".annotation_end_time").val();
      if (!(_0xfcf6.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x1854f1.hide_time = _0xfcf6;
      }
      var _0x96b977 = _0x2fdbb4.find(".annotation_link").val();
      if (!(_0x96b977.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x1854f1.link = _0x96b977;
        _0x1854f1.target = _0x2fdbb4.find(".annotation_target").val();
        var _0x548be1 = _0x2fdbb4.find('.annotation_rel').val();
        if (!(_0x548be1.replace(/^\s+|\s+$/g, '').length == 0x0)) {
          _0x1854f1.rel = _0x548be1;
        }
      }
      _0x1854f1.close_btn = _0x2fdbb4.find(".annotation_close_btn").val();
      _0x1854f1.close_btn_position = _0x2fdbb4.find('.annotation_close_btn_position').val();
      _0x1854f1.position = _0x2fdbb4.find(".annotation_position").val();
      var _0x1072a9 = _0x2fdbb4.find('.annotation_adit_class').val().replace(/"/g, "'");
      if (!(_0x1072a9.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x1854f1.adit_class = _0x1072a9;
      }
      var _0x20842f = _0x2fdbb4.find(".annotation_css").val().replace(/"/g, "'");
      if (!(_0x20842f.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x1854f1.css = _0x20842f;
      }
      _0x36a7e0.push(_0x1854f1);
    });
    return _0x36a7e0;
  }
  function _0x301dab(_0x31d54c, _0x412e5d) {
    var _0x5cbcea = {
      "ad_type": _0x412e5d,
      type: _0x31d54c.find(".ad_type").val(),
      "path": _0x31d54c.find('.ad_path').val().replace(/"/g, "'"),
      "is360": _0x31d54c.find(".ad_is360").val(),
      vrMode: _0x31d54c.find(".ad_vrMode").val()
    };
    var _0x2f0b6b = _0x31d54c.find(".ad_duration").val();
    if (!(_0x2f0b6b.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x5cbcea.duration = _0x2f0b6b;
    }
    var _0x436cbf = _0x31d54c.find('.ad_begin').val();
    if (!(_0x436cbf.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x5cbcea.begin = _0x436cbf;
    }
    var _0x480c44 = _0x31d54c.find('.ad_poster').val().replace(/"/g, "'");
    if (!(_0x480c44.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x5cbcea.poster = _0x480c44;
    }
    var _0x5152fb = _0x31d54c.find('.ad_skip_enable').val();
    if (!(_0x5152fb.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x5cbcea.skip_enable = _0x5152fb;
    }
    var _0x4128a1 = _0x31d54c.find(".mvp_ad_link").val();
    if (!(_0x4128a1.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x5cbcea.link = _0x4128a1;
      _0x5cbcea.target = _0x31d54c.find('.ad_target').val();
      _0x5cbcea.rel = _0x31d54c.find('.ad_rel').val();
    }
    return _0x5cbcea;
  }
  function _0x39562b(_0x22c320, _0x58aaea) {
    var _0x548819 = "[apmvp_ad ad_type=\"" + _0x58aaea + "\"";
    var _0x5160c3 = _0x22c320.find('.ad_type').val();
    _0x548819 += " type=\"" + _0x5160c3 + "\"";
    var _0x532b6f = _0x22c320.find(".ad_path").val().replace(/"/g, "'");
    _0x548819 += " path=\"" + _0x532b6f + "\"";
    var _0x1b5cb8 = _0x22c320.find(".ad_is360").val();
    if (_0x1b5cb8 == '1') {
      _0x548819 += " is360=\"1\"";
      var _0x5b13a4 = _0x22c320.find('.ad_vrMode').val();
      _0x548819 += " vrmode=\"" + _0x5b13a4 + "\"";
    }
    var _0x580bdb = _0x22c320.find(".ad_duration").val();
    if (!(_0x580bdb.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x548819 += " duration=\"" + _0x580bdb + "\"";
    }
    var _0x48a4ea = _0x22c320.find(".ad_begin").val();
    if (!(_0x48a4ea.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x548819 += " begin=\"" + _0x48a4ea + "\"";
    }
    var _0x5caabf = _0x22c320.find(".ad_poster").val().replace(/"/g, "'");
    if (!(_0x5caabf.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x548819 += " poster=\"" + _0x5caabf + "\"";
    }
    var _0xfdcd26 = _0x22c320.find(".ad_skip_enable").val();
    if (!(_0xfdcd26.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x548819 += " skip_enable=\"" + _0xfdcd26 + "\"";
    }
    var _0x35a423 = _0x22c320.find(".mvp_ad_link").val();
    if (!(_0x35a423.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x548819 += " link=\"" + _0x35a423 + "\"";
      _0x548819 += " target=\"" + _0x35a423 + "\"";
      var _0x99c979 = _0x22c320.find(".ad_rel").val();
      if (_0x99c979) {
        _0x548819 += " rel=\"" + _0x99c979 + "\"";
      }
    }
    _0x548819 += '][/apmvp_ad]';
    return _0x548819;
  }
  function _0x2ca600() {
    _0x3c014c.hide();
    _0x27bc83.removeClass("mvp-modal-open");
    _0x4a3a32('#ad-section-live').html('');
    _0x2350e7 = _0x538222;
    if (!_0x433e8c.hasClass("mvp-not-form")) {
      _0x433e8c[0x0].reset();
      _0x3c014c.find(".mvp-img-preview").attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    } else {
      _0x5e9fef(_0x433e8c);
    }
    _0x1098fe.empty();
    _0x3c014c.find(".multi_path_section").remove();
    _0x3c014c.find(".subtitle_section").remove();
    _0xffee3e.change();
    _0x397b46.html('');
    _0x40879c();
    _0x3c014c.find(".mvp-ad-source").remove();
    _0x3c014c.find(".mvp-annotation-source").remove();
    _0xb62561.find(".mvp-tab-header li").eq(0x0).click();
    _0xc7ae14.hide();
    _0x4a3a32('#ad-section-timeline-holder').find(".ad-section-timeline-point").remove();
  }
  var _0x4c9ce1 = _0x4a3a32("#mvp-add-media").on('click', function (_0x13089b) {
    _0x20edda.find("#type").attr("disabled", false);
    _0x38cbb5 = "add_media";
    _0x2ff73d.click();
    _0xffee3e.change();
    _0x3b5533();
  });
  function _0x3b5533() {
    if (_0x38cbb5 == "add_media") {
      _0xc7ae14.show();
      if (_0x2350e7) {
        _0xffee3e.val(_0x2350e7).change();
      }
    } else {
      _0xc7ae14.hide();
    }
    _0x3c014c.show();
    _0x391656.scrollTop(0x0);
    _0x27bc83.addClass("mvp-modal-open");
  }
  var _0x36c675 = _0x4a3a32('#mvp-edit-playlist-form');
  _0x36c675.keydown(function (_0x21ccc0) {
    if (_0x21ccc0.keyCode == 0xd) {
      _0x21ccc0.preventDefault();
      return false;
    }
  });
  var _0xa3fce2;
  _0x4a3a32('#mvp-edit-playlist-form-submit').on('click', function () {
    if (_0xa3fce2) {
      return false;
    }
    _0xa3fce2 = true;
    _0x1294db.show();
    var _0x1d985d = {};
    _0x4a3a32.each(_0x36c675.serializeArray(), function (_0x5644de, _0x407fc7) {
      if (_0x407fc7.name != 'lockVideoUserRoles[]') {
        _0x1d985d[_0x407fc7.name] = _0x407fc7.value;
      }
    });
    var _0x11c761 = [];
    _0x4a3a32('#lockVideoUserRoles_field').find("input:checkbox:checked").each(function () {
      _0x11c761.push(_0x4a3a32(this).val());
    });
    _0x1d985d.lockVideoUserRoles = _0x11c761;
    var _0x497f19 = [{
      'name': "action",
      'value': "mvp_save_playlist_options"
    }, {
      'name': 'playlist_id',
      'value': _0x4a3a32(".mvp-admin").attr('data-playlist-id')
    }, {
      'name': 'playlist_options',
      'value': JSON.stringify(_0x1d985d)
    }, {
      'name': 'security',
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0x497f19,
      'dataType': "json"
    }).done(function (_0x21ce96) {
      _0x1294db.hide();
      _0xa3fce2 = false;
    }).fail(function (_0x4574b3, _0x2dd876, _0x4f6471) {
      console.log(_0x4574b3.responseText, _0x2dd876, _0x4f6471);
      _0x1294db.hide();
      _0xa3fce2 = false;
    });
    return false;
  });
  var _0x4790f3 = _0x4a3a32("#multi_path_content");
  var _0x2ff73d = _0x4a3a32("#multi_path_field_add").on("click", function (_0xb12474) {
    var _0x2e83ff = _0x4790f3.find(".multi_path_section_orig").clone().removeClass("multi_path_section_orig").addClass("multi_path_section");
    _0x2e83ff.insertBefore(_0x4a3a32(this));
    _0x2e83ff.find('.multi_path').attr('ap-required', true);
    _0x2e83ff.find('.quality_title').attr('ap-required', true);
    _0x5ade2e();
  });
  _0x4790f3.on("blur", '.multi_path', function () {
    var _0x25c72b = _0x4a3a32(this).val();
    if (_0x538222 == "video") {
      if (_0x25c72b.indexOf("youtube") > -0x1) {
        alert(_0x571282.attr("data-wrong-media"));
        return;
      }
    }
  });
  var _0x1c73b8 = _0x4a3a32("#multi_path_field").on("click", ".multi_path_upload", function (_0x1b5299) {
    _0x1b5299.preventDefault();
    var _0x52bec4 = _0x4a3a32(this);
    var _0x4a4686;
    var _0x1711f2;
    var _0x271785;
    _0x1711f2 = _0x52bec4.parent().find('.multi_path');
    if (_0x538222 == 'video') {
      _0x4a4686 = "video/*";
    } else {
      if (_0x538222 == 'audio') {
        _0x4a4686 = "audio/*";
      } else if (_0x538222 == "image") {
        _0x4a4686 = "image";
      }
    }
    _0x271785 = wp.media({
      'library': {
        'type': _0x4a4686
      }
    });
    _0x271785.on("select", function () {
      var _0xfdd6f2 = _0x271785.state().get('selection').first().toJSON();
      _0x4a3a32(_0x1711f2).val(_0xfdd6f2.url);
      if (_0xfdd6f2.title) {
        _0x4a3a32("#title").val(_0xfdd6f2.title);
      }
      if (_0xfdd6f2.description) {
        _0x4a3a32("#description").val(_0xfdd6f2.description);
      }
      if (_0xfdd6f2.fileLength) {
        _0x4a3a32('#duration').val(_0x3632e8(_0xfdd6f2.fileLength));
      }
    }).open();
  });
  _0x1c73b8.on("click", ".multi_path_field_remove", function () {
    _0x4a3a32(this).closest(".multi_path_section").remove();
    _0x5ade2e();
  });
  function _0x5ade2e() {
    if (_0x4790f3.find(".multi_path_section").length > 0x1) {
      _0x4790f3.find(".multi_path_field_remove").each(function () {
        _0x4a3a32(this).show();
      });
    } else {
      _0x4790f3.find('.multi_path_field_remove').each(function () {
        _0x4a3a32(this).hide();
      });
    }
  }
  _0x5ade2e();
  var _0x4f920e = _0x4a3a32("#subtitle_content");
  _0x4a3a32("#subtitle_field_add").on("click", function (_0xf96fa9) {
    var _0x678ce3 = _0x4f920e.find('.subtitle_section_orig').clone().removeClass('subtitle_section_orig').addClass("subtitle_section");
    _0x678ce3.find(".subtitle_src").attr('ap-required', true);
    _0x678ce3.find(".subtitle_label").attr("ap-required", true);
    _0x678ce3.insertBefore(_0x4a3a32(this));
  });
  _0x4f920e.on("click", ".subtitle_field_remove", function () {
    _0x4a3a32(this).closest(".subtitle_section").remove();
  });
  var _0x3873aa = _0x4a3a32("#subtitle_field").on('click', ".subtitle_src_upload", function (_0x13008d) {
    _0x13008d.preventDefault();
    var _0x4304d2 = _0x4a3a32(this);
    var _0x3f1193;
    var _0x237269;
    var _0x31a8c0;
    _0x237269 = _0x4304d2.parent().find(".subtitle_src");
    if (_0x3873aa.data("custom-uploader")) {
      _0x31a8c0 = _0x3873aa.data("custom-uploader").uploader;
    } else {
      _0x3f1193 = '';
      _0x31a8c0 = wp.media({
        'library': {
          'type': _0x3f1193
        }
      });
      _0x3873aa.data('custom-uploader', {
        'uploader': _0x31a8c0
      });
    }
    _0x31a8c0.off('select').on('select', function () {
      var _0xca8ac8 = _0x31a8c0.state().get("selection").first().toJSON();
      _0x4a3a32(_0x237269).val(_0xca8ac8.url);
    }).open();
  });
  _0x4f920e.on("click", ".subtitle_default", function () {
    _0x4a3a32(this).on('change', function () {
      if (_0x4a3a32(this).is(":checked")) {
        _0x4f920e.find('.subtitle_default').prop("checked", false);
        _0x4a3a32(this).prop("checked", true);
      }
    });
  });
  _0x4a3a32(".mvp-media-path-ta").on("blur", function () {
    var _0x18cf76 = _0x4a3a32(this).val();
    if (_0x538222.indexOf("youtube") > -0x1 && _0x18cf76.indexOf('youtube') > -0x1) {
      alert(_0x571282.attr("data-enter-just-id"));
      return;
    } else {
      if (_0x538222.indexOf("vimeo") > -0x1 && _0x18cf76.indexOf("vimeo") > -0x1) {
        alert(_0x571282.attr("data-enter-just-id"));
        return;
      }
    }
    if (_0x538222 == "youtube_single" || _0x538222 == 'vimeo_single') {
      if (!(_0x18cf76.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        if (_0x538222 == "youtube_single") {
          var _0x784cf1 = "https://www.youtube.com/watch?v=" + _0x18cf76;
        } else {
          if (_0x538222 == "vimeo_single") {
            var _0x784cf1 = "https://vimeo.com/" + _0x18cf76;
          }
        }
        _0x4a3a32.getJSON("https://noembed.com/embed", {
          'format': 'json',
          'url': _0x784cf1
        }, function (_0x2e9a13) {
          if (_0x2e9a13.title) {
            _0x4bfff2.val(_0x2e9a13.title);
          }
          if (_0x2e9a13.thumbnail_url) {
            _0x50d2e3.val(_0x2e9a13.thumbnail_url);
            _0x14d068.attr('src', _0x2e9a13.thumbnail_url);
            _0x443919.val(_0x2e9a13.thumbnail_url);
            _0x248b13.attr('src', _0x2e9a13.thumbnail_url);
          }
          if (_0x2e9a13.description) {
            _0x5b62a1.val(_0x2e9a13.description);
          }
          if (_0x2e9a13.duration) {
            _0x501b29.val(_0x2e9a13.duration);
          }
          if (_0x2e9a13.account_type) {
            _0x5a1ea2.val(_0x2e9a13.account_type);
          }
          if (_0x2e9a13.upload_date) {
            var _0x4f9c7e = _0x2e9a13.upload_date.split(" ");
            _0x2df758.val(_0x4f9c7e[0x0]);
          }
        });
      }
    }
  });
  function _0x40879c() {
    var _0x51839d = '';
    _0x397b46.find('.slideshow-img').each(function () {
      _0x51839d += _0x4a3a32(this).attr('src') + ',';
    });
    _0x51839d = _0x51839d.substr(0x0, _0x51839d.length - 0x1);
    _0x326da3.val(_0x51839d);
    if (_0x397b46.find(".slideshow-img-wrap").length == 0x0) {
      _0x397b46.addClass("slideshow_images_field_hidden");
      _0x291a45.hide();
    } else {
      _0x397b46.removeClass("slideshow_images_field_hidden");
      _0x291a45.show();
    }
  }
  var _0x397b46 = _0x3c014c.find("#slideshow_images_field").on('click', '.slideshow-img-remove', function () {
    _0x4a3a32(this).closest('.slideshow-img-wrap').remove();
    _0x40879c();
  });
  var _0x36f60d = _0x3c014c.find('#slideshow_field');
  var _0x326da3 = _0x3c014c.find("#slideshow_images");
  var _0x291a45 = _0x3c014c.find('#slideshow_remove_all').on('click', function () {
    var _0x247278 = confirm("Are you sure you want to delete all?");
    if (_0x247278) {
      _0x397b46.html('');
      _0x40879c();
    }
  });
  _0x397b46.sortable({
    'items': ".slideshow-img-wrap",
    'tolerance': "pointer",
    'helper': "clone",
    'stop': function (_0x25fdff, _0x147c92) {
      _0x40879c();
    }
  });
  var _0x1d0a27 = _0x4a3a32('#mvp-icon-modal');
  var _0x34fb65 = _0x1d0a27.find(".mvp-modal-bg").on("click", function (_0x50208b) {
    if (_0x50208b.target == this) {
      _0x252d74();
    }
  });
  var _0x5868ef;
  var _0x5061bc;
  var _0x5bf42d;
  var _0x33b505 = _0x1d0a27.find('#icon-picker-list');
  function _0x103200() {
    var _0x4e4305 = document.getElementsByTagName("head")[0x0];
    var _0x4c7c68 = document.createElement("link");
    _0x4c7c68.rel = "stylesheet";
    _0x4c7c68.type = 'text/css';
    _0x4c7c68.href = mvp_data.fontAwesomeUrl;
    _0x4e4305.appendChild(_0x4c7c68);
    _0x4a3a32.ajax({
      'type': "GET",
      'url': 'https://raw.githubusercontent.com/FortAwesome/Font-Awesome/master/metadata/icons.json',
      'dataType': "json"
    }).done(function (_0x3b47f7) {
      var _0x584ec3;
      Object.keys(_0x3b47f7).forEach(function (_0x374e60) {
        _0x584ec3 = "<li class=\"mvp-icon-cont\" title=\"" + _0x374e60 + "\"><a><span class=\"mvp-fa-icon\" data-value=\"" + _0x3b47f7[_0x374e60].unicode + "\">&#x" + _0x3b47f7[_0x374e60].unicode + ";</span><span class=\"mvp-fa-icon-name\">" + _0x374e60 + '</span></a></li>';
        _0x33b505.append(_0x584ec3);
      });
      _0x5061bc = true;
    }).fail(function (_0x1242c4, _0x19af2b, _0x5ae1b2) {
      console.log(_0x1242c4, _0x19af2b, _0x5ae1b2);
      _0x5061bc = true;
    });
  }
  function _0x273490() {
    _0x1d0a27.show();
    _0x34fb65.scrollTop(0x0);
    _0x27bc83.addClass("mvp-modal-open");
  }
  function _0x252d74() {
    _0x1d0a27.hide();
    _0x27bc83.removeClass("mvp-modal-open");
    _0x33b505.find(".mvp-icon-cont").show();
    _0x22580c.val('');
  }
  var _0x22580c = _0x1d0a27.find("#mvp-icon-search").on("keyup", function () {
    var _0xa5c67 = _0x4a3a32(this).val().toLowerCase();
    _0x33b505.find(".mvp-icon-cont").each(function () {
      var _0xe3b4e5 = _0x4a3a32(this);
      var _0x5b0b98 = _0xe3b4e5.attr("title");
      if (_0x5b0b98.indexOf(_0xa5c67) > -0x1) {
        _0xe3b4e5.show();
      } else {
        _0xe3b4e5.hide();
      }
    });
  }).on("search", function () {
    if (this.value == '') {
      _0x22580c.trigger('keyup');
    }
  });
  _0x1d0a27.on("click", ".mvp-icon-modal-close", function () {
    _0x252d74();
  });
  _0x33b505.on("click", '.mvp-icon-cont', function () {
    var _0xd5ea00 = _0x4a3a32(this).find('.mvp-fa-icon').attr("data-value");
    var _0x1db72f = "&#x" + _0xd5ea00 + ';';
    var _0x2b1a11 = _0x5bf42d.closest(".mvp-icon-table");
    _0x2b1a11.find(".mvp-pi-icon").val(_0x1db72f);
    _0x2b1a11.find('.mvp-pi-icon-preview').html(_0x1db72f);
    _0x252d74();
  });
  _0x3c014c.on("click", ".mvp-add-fa-icon", function () {
    _0x5bf42d = _0x4a3a32(this);
    if (!_0x5868ef) {
      _0x5868ef = true;
      _0x1294db.show();
      _0x103200();
      var _0x3fbb05 = setInterval(function () {
        if (_0x5061bc) {
          if (_0x3fbb05) {
            clearInterval(_0x3fbb05);
          }
          _0x1294db.hide();
          _0x273490();
        }
      }, 0x64);
    } else {
      _0x273490();
    }
  });
  var _0x1098fe = _0x4a3a32("#mvp-pi-table-wrap").on("click", ".pi_remove", function (_0x4b0d40) {
    _0x4a3a32(this).closest(".mvp-pi-table").remove();
    if (_0x1098fe.children().length == 0x0) {
      _0x1098fe.hide();
    }
  });
  _0x1098fe.sortable({
    'handle': ".mvp-pi-icon-sort",
    'cancel': ''
  });
  _0x4a3a32("#pi_add").on("click", function (_0x39baea) {
    _0x5844ed();
    _0x1098fe.show();
  });
  function _0x5844ed(_0x188fb8) {
    var _0x2f9c2a = _0x4a3a32(".mvp-pi-table-orig").clone().removeClass("mvp-pi-table-orig").addClass("mvp-pi-table").show().appendTo(_0x1098fe);
    if (typeof _0x188fb8 !== 'undefined') {
      _0x2f9c2a.find(".mvp-pi-icon").attr("ap-required", true).val(_0x188fb8.icon);
      _0x2f9c2a.find(".mvp-pi-icon-preview").html(_0x188fb8.icon);
      _0x2f9c2a.find(".mvp-pi-title").val(_0x188fb8.title);
      _0x2f9c2a.find(".mvp-pi-url").val(_0x188fb8.url);
      _0x2f9c2a.find('.mvp-pi-target').val(_0x188fb8.target).change();
      _0x2f9c2a.find(".mvp-pi-rel").val(_0x188fb8.rel);
      _0x2f9c2a.find(".mvp-pi-class").val(_0x188fb8['class']);
    } else {
      _0x2f9c2a.find('.mvp-pi-icon').attr("ap-required", true);
    }
  }
  var _0x20edda = _0x3c014c.find("#select_media_type_field");
  var _0x538222;
  var _0x30a47e = _0x3c014c.find("#disabled_field");
  var _0x1100bc = _0x3c014c.find("#path_field");
  var _0x3dccd5 = _0x3c014c.find("#path");
  var _0x57de00 = _0x3c014c.find("#path_upload");
  var _0x5a1ea2 = _0x3c014c.find("#vimeo_account_type");
  var _0x2df758 = _0x3c014c.find("#vimeo_upload_date");
  var _0x7b4ef8 = _0x3c014c.find("#mp4_field");
  var _0xa46672 = _0x3c014c.find("#mp4");
  var _0x3494c1 = _0x3c014c.find('#title_field');
  var _0x4bfff2 = _0x3c014c.find('#title');
  var _0x34213c = _0x3c014c.find('#description_field');
  var _0x5b62a1 = _0x3c014c.find("#description");
  var _0x22bb41 = _0x3c014c.find("#thumb_field");
  var _0x11e6f6 = _0x3c014c.find("#thumb_alt_field");
  var _0x50d2e3 = _0x3c014c.find('#thumb').on("keyup", function () {
    if (_0x4a3a32(this).val() == '') {
      _0x14d068.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    }
  });
  var _0x14d068 = _0x3c014c.find("#thumb_preview");
  var _0x28d090 = _0x3c014c.find("#alt_text");
  var _0x1e3b61 = _0x3c014c.find("#poster_field");
  var _0x443919 = _0x3c014c.find('#poster').on("keyup", function () {
    if (_0x4a3a32(this).val() == '') {
      _0x248b13.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    }
  });
  var _0x248b13 = _0x3c014c.find('#poster_preview');
  var _0x28fc04 = _0x3c014c.find("#poster_frame_time_field");
  var _0x289ce6 = _0x3c014c.find("#poster_frame_time");
  var _0x2efb3b = _0x3c014c.find("#poster_audio_info");
  var _0x3e9ef5 = _0x3c014c.find("#exclude_field");
  var _0x2da2e5 = _0x3c014c.find("#exclude");
  var _0x3d5b88 = _0x3c014c.find("#bkey_field");
  var _0x524c4a = _0x3c014c.find("#bkey");
  var _0x35a4ff = _0x3c014c.find("#download_field");
  var _0x3da10c = _0x3c014c.find("#download");
  var _0x50fa43 = _0x3c014c.find("#preview_seek_field");
  var _0x287453 = _0x3c014c.find('#preview_seek');
  var _0x18aee5 = _0x3c014c.find("#hover_preview_field");
  var _0x1147d8 = _0x3c014c.find("#hover_preview");
  var _0x2b443e = _0x3c014c.find('#folder_sort');
  var _0x3b107e = _0x3c014c.find("#limit");
  var _0x316867 = _0x3c014c.find("#chapters_field");
  var _0x627d74 = _0x3c014c.find("#chapters");
  var _0x48717e = _0x3c014c.find("#chapters_cors");
  var _0x14844d = _0x3c014c.find("#share_field");
  var _0xa2ef62 = _0x3c014c.find("#limit_field");
  var _0x512497 = _0x3c014c.find('#id3_field');
  var _0xeeef9d = _0x3c014c.find('#id3');
  var _0x9be7f5 = _0x3c014c.find("#folder_custom_url_field");
  var _0x1fa62a = _0x3c014c.find('#folder_custom_url');
  var _0x276d91 = _0x3c014c.find("#vast");
  var _0x9be9dc = _0x3c014c.find('#folder_sort_field');
  var _0x4a6733 = _0x3c014c.find("#start_field");
  var _0x41bf1a = _0x3c014c.find("#start");
  var _0x34dbf3 = _0x3c014c.find("#end_field");
  var _0x4d9556 = _0x3c014c.find("#end");
  var _0x5a7575 = _0x3c014c.find("#playback_rate_field");
  var _0x4f5562 = _0x3c014c.find("#playback_rate");
  var _0x34c1e7 = _0x3c014c.find("#yt_quality_field");
  var _0x33d9ac = _0x3c014c.find("#yt_sort_field");
  var _0x5b7d8e = _0x3c014c.find("#yt_sort");
  var _0x310a5d = _0x3c014c.find("#vimeo_channel_sort_field");
  var _0x337c00 = _0x3c014c.find('#vimeo_channel_sort');
  var _0x45fc61 = _0x3c014c.find("#vimeo_album_sort_field");
  var _0x1de2dc = _0x3c014c.find("#vimeo_album_sort");
  var _0x2fc2b8 = _0x3c014c.find('#vimeo_group_sort_field');
  var _0x303e4e = _0x3c014c.find("#vimeo_group_sort");
  var _0x57c0e0 = _0x3c014c.find("#vimeo_video_query_sort_field");
  var _0x4324dc = _0x3c014c.find("#vimeo_folder_sort_field");
  var _0x3545ac = _0x3c014c.find("#vimeo_folder_sort");
  var _0x3588ef = _0x3c014c.find("#vimeo_ondemand_sort_field");
  var _0x546dfb = _0x3c014c.find("#vimeo_ondemand_sort");
  var _0x3d7237 = _0x3c014c.find("#vimeo_sort_dir_field");
  var _0x3dacf3 = _0x3c014c.find('#vimeo_sort_dir');
  var _0x2fa6e8 = _0x3c014c.find('#lock_time');
  var _0x263758 = _0x3c014c.find("#noapi_field");
  var _0x28e887 = _0x3c014c.find("#noapi");
  var _0xbd000e = _0x3c014c.find("#is360_field");
  var _0x185899 = _0x3c014c.find("#is360");
  var _0x23c62c = _0x3c014c.find("#vrMode_field");
  var _0x12a49e = _0x3c014c.find('#vrMode');
  var _0x44de76 = _0x3c014c.find("#load_more_field");
  var _0x329615 = _0x3c014c.find('#load_more');
  var _0x29d466 = _0x3c014c.find("#gdrive_sort_field");
  var _0x1f292f = _0x3c014c.find("#gdrive_sort");
  var _0x296dbb = _0x3c014c.find("#onedrive_sort_field");
  var _0x40a10b = _0x3c014c.find("#onedrive_sort");
  var _0x563051 = _0x3c014c.find("#user_id_field");
  var _0x30b799 = _0x3c014c.find('#user_id');
  var _0x7fb69e = _0x3c014c.find('#duration_field');
  var _0x501b29 = _0x3c014c.find("#duration");
  var _0x496131 = _0x3c014c.find('#pwd_field');
  var _0x3358e6 = _0x3c014c.find('#pwd');
  var _0x52131f = _0x3c014c.find('#vpwd_field');
  var _0x5beb05 = _0x3c014c.find("#vpwd");
  var _0x5d923b = _0x3c014c.find("#age_verify");
  var _0x327ff5 = _0x3c014c.find('#link');
  var _0x1c8ae6 = _0x3c014c.find("#target");
  var _0x371bfe = _0x3c014c.find("#end_link_field");
  var _0x2fc0c1 = _0x3c014c.find("#end_link");
  var _0x36c824 = _0x3c014c.find("#end_target_field");
  var _0x70d6dd = _0x3c014c.find("#end_target");
  var _0x1b9cb2 = _0x3c014c.find('#islive_field');
  var _0xbc030c = _0x3c014c.find("#islive");
  var _0x38792b = _0x3c014c.find('#mvp_size_field');
  var _0xc5e096 = _0x3c014c.find('#video_info');
  var _0x153bad = _0x3c014c.find("#audio_info");
  var _0x20ad94 = _0x3c014c.find("#image_info");
  var _0x5acc7b = _0x3c014c.find("#folder_info");
  var _0x83c345 = _0x3c014c.find("#gdrive_info");
  var _0x690156 = _0x3c014c.find('#onedrive_info');
  var _0x97313d = _0x3c014c.find("#custom_info");
  var _0x204b2f = _0x3c014c.find("#custom_html_info");
  var _0x24d938 = _0x3c014c.find("#hls_info");
  var _0x224b42 = _0x3c014c.find('#dash_info');
  var _0x29a61c = _0x3c014c.find("#yt_video_info");
  var _0x174c61 = _0x3c014c.find("#yt_video_multiple_info");
  var _0x5d3e05 = _0x3c014c.find("#yt_playlist_info");
  var _0x548cbe = _0x3c014c.find('#yt_channel_info');
  var _0x49e758 = _0x3c014c.find("#yt_backend_info");
  var _0x28bd36 = _0x3c014c.find("#yt_user_info");
  var _0x315bf2 = _0x3c014c.find("#yt_query_info");
  var _0x195693 = _0x3c014c.find("#vim_video_info");
  var _0x33e836 = _0x3c014c.find("#vim_video_multiple_info");
  var _0x3dd691 = _0x3c014c.find("#vim_channel_info");
  var _0x592fbc = _0x3c014c.find('#vim_group_info');
  var _0x50207f = _0x3c014c.find('#vim_album_info');
  var _0x584e19 = _0x3c014c.find("#vim_folder_info");
  var _0x38451b = _0x3c014c.find("#vim_ondemand_info");
  var _0x49df1f = _0x3c014c.find('#xml_info');
  var _0x30429b = _0x3c014c.find("#json_info");
  var _0x149097 = _0x3c014c.find("#poster_info");
  var _0x546238 = _0x3c014c.find('#s3_bucket_video_info');
  var _0x59ea90 = _0x3c014c.find("#randomizeAdPre");
  var _0x21e11f = _0x3c014c.find("#randomizeAdEnd");
  var _0x3187e9 = _0x433e8c.find("#path_remove").on("click", function (_0x5cb614) {
    _0x5cb614.preventDefault();
    _0x3dccd5.val('');
  });
  var _0x63af27 = _0x433e8c.find("#thumb_remove").on("click", function (_0x44c3ba) {
    _0x44c3ba.preventDefault();
    _0x14d068.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x50d2e3.val('');
  });
  if (_0x50d2e3.val() != '') {
    _0x63af27.show();
  }
  var _0x6c03ca = _0x433e8c.find('#poster_remove').on("click", function (_0xc87055) {
    _0xc87055.preventDefault();
    _0x248b13.attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
    _0x443919.val('');
  });
  if (_0x443919.val() != '') {
    _0x6c03ca.show();
  }
  var _0x43e0f6;
  var _0x2350e7;
  var _0xffee3e = _0x3c014c.find("#type").on("change", function () {
    _0x538222 = _0x4a3a32(this).val();
    _0x1100bc.hide();
    _0x57de00.hide();
    _0x3187e9.hide();
    _0x7b4ef8.hide();
    _0x3dccd5.attr("ap-required", false).val('');
    _0x3d5b88.hide();
    _0x524c4a.attr("ap-required", false);
    _0x3e9ef5.hide();
    _0x1c73b8.hide().find(".multi_path, .quality_title").attr("ap-required", false);
    _0x3494c1.hide();
    _0x34213c.hide();
    _0x22bb41.hide();
    _0x11e6f6.hide();
    _0x1e3b61.hide();
    _0x28fc04.hide();
    _0x2efb3b.hide();
    _0x35a4ff.hide();
    _0x14844d.hide();
    _0xa2ef62.hide();
    _0x512497.hide();
    _0x9be9dc.hide();
    _0x9be7f5.hide();
    _0x29d466.hide();
    _0x296dbb.hide();
    if (_0x43e0f6) {}
    _0x36f60d.hide();
    _0x34c1e7.hide();
    _0x263758.hide();
    _0xbd000e.hide();
    _0x23c62c.hide();
    _0x1b9cb2.hide();
    _0x44de76.hide();
    _0x5a7575.hide();
    _0x3873aa.hide();
    _0x50fa43.hide();
    _0x18aee5.hide();
    _0x316867.hide();
    _0x4a6733.hide();
    _0x34dbf3.hide();
    _0x7fb69e.hide();
    _0x496131.hide();
    _0x52131f.hide();
    _0x371bfe.hide();
    _0x36c824.hide();
    _0x563051.hide();
    _0x30b799.attr("ap-required", false).val('');
    _0x38792b.hide();
    _0xc5e096.hide();
    _0x153bad.hide();
    _0x20ad94.hide();
    _0x5acc7b.hide();
    _0x83c345.hide();
    _0x690156.hide();
    _0x97313d.hide();
    _0x204b2f.hide();
    _0x24d938.hide();
    _0x224b42.hide();
    _0x29a61c.hide();
    _0x174c61.hide();
    _0x5d3e05.hide();
    _0x548cbe.hide();
    _0x49e758.hide();
    _0x28bd36.hide();
    _0x315bf2.hide();
    _0x195693.hide();
    _0x33e836.hide();
    _0x3dd691.hide();
    _0x592fbc.hide();
    _0x50207f.hide();
    _0x584e19.hide();
    _0x38451b.hide();
    _0x49df1f.hide();
    _0x30429b.hide();
    _0x546238.hide();
    _0x149097.show();
    _0x33d9ac.hide();
    _0x310a5d.hide();
    _0x45fc61.hide();
    _0x2fc2b8.hide();
    _0x57c0e0.hide();
    _0x3588ef.hide();
    _0x4324dc.hide();
    _0x3d7237.hide();
    _0x50fa43.show();
    if (_0x433e8c.length) {
      if (!_0x433e8c.hasClass("mvp-not-form")) {
        _0x433e8c[0x0].reset();
      } else {
        _0x5e9fef(_0x433e8c);
      }
    }
    _0x4a3a32(this).val(_0x538222);
    if (_0x538222 == "video") {
      _0x1c73b8.show().find('.multi_path_section').find(".multi_path, .quality_title").attr("ap-required", true);
      _0x1c73b8.find(".multi_path");
      _0x3494c1.show();
      _0x34213c.show();
      _0x22bb41.show();
      _0x11e6f6.show();
      _0x1e3b61.show();
      _0x28fc04.show();
      _0x14844d.show();
      _0x35a4ff.show();
      _0x7fb69e.show();
      _0x4a3a32(".duration-media-info").show();
      _0x4a3a32('.duration-image-info').hide();
      _0x5a7575.show();
      _0x4a6733.show();
      _0x34dbf3.show();
      _0x3873aa.show();
      _0x316867.show();
      _0x18aee5.show();
      _0x496131.show();
      _0x371bfe.show();
      _0x36c824.show();
      _0xbd000e.show();
      _0x23c62c.show();
      _0xc5e096.show();
    } else {
      if (_0x538222 == "s3_bucket_video") {
        _0x1100bc.show();
        _0x3dccd5.attr('ap-required', true);
        _0x29d466.show();
        _0x546238.show();
        _0xbd000e.show();
      } else {
        if (_0x538222 == 's3_video') {
          _0x1100bc.show();
          _0x3dccd5.attr("ap-required", true);
          _0x546238.show();
          _0x3d5b88.show();
          _0x524c4a.attr("ap-required", true);
          _0x3494c1.show();
          _0x34213c.show();
          _0x22bb41.show();
          _0x11e6f6.show();
          _0x1e3b61.show();
          _0x28fc04.show();
          _0x14844d.show();
          _0x35a4ff.show();
          _0x7fb69e.show();
          _0x4a3a32(".duration-media-info").show();
          _0x4a3a32(".duration-image-info").hide();
          _0x5a7575.show();
          _0x4a6733.show();
          _0x34dbf3.show();
          _0x3873aa.show();
          _0x316867.show();
          _0x18aee5.show();
          _0x496131.show();
          _0x371bfe.show();
          _0x36c824.show();
          _0xbd000e.show();
          _0x23c62c.show();
        } else {
          if (_0x538222 == 'hls') {
            _0x1100bc.show();
            _0x3dccd5.attr("ap-required", true);
            _0x57de00.show();
            _0x7b4ef8.show();
            _0x3494c1.show();
            _0x34213c.show();
            _0x22bb41.show();
            _0x11e6f6.show();
            _0x1e3b61.show();
            _0x14844d.show();
            _0x35a4ff.show();
            _0x5a7575.show();
            _0x3873aa.show();
            _0x316867.show();
            _0x18aee5.show();
            _0x496131.show();
            _0x371bfe.show();
            _0x36c824.show();
            _0x1b9cb2.show();
            _0xbd000e.show();
            _0x24d938.show();
          } else {
            if (_0x538222 == 'dash') {
              _0x1100bc.show();
              _0x3dccd5.attr("ap-required", true);
              _0x57de00.show();
              _0x7b4ef8.show();
              _0x3494c1.show();
              _0x34213c.show();
              _0x22bb41.show();
              _0x11e6f6.show();
              _0x1e3b61.show();
              _0x14844d.show();
              _0x35a4ff.show();
              _0x5a7575.show();
              _0x3873aa.show();
              _0x316867.show();
              _0x18aee5.show();
              _0x496131.show();
              _0x371bfe.show();
              _0x36c824.show();
              _0x1b9cb2.show();
              _0xbd000e.show();
              _0x224b42.show();
            } else {
              if (_0x538222 == 'audio') {
                _0x1c73b8.show().find(".multi_path_section").find(".multi_path, .quality_title").attr('ap-required', true);
                _0x1c73b8.find(".multi_path");
                _0x3494c1.show();
                _0x34213c.show();
                _0x22bb41.show();
                _0x11e6f6.show();
                _0x1e3b61.show();
                _0x14844d.show();
                _0x35a4ff.show();
                _0x7fb69e.show();
                _0x4a3a32(".duration-media-info").show();
                _0x4a3a32(".duration-image-info").hide();
                _0x5a7575.show();
                _0x4a6733.show();
                _0x34dbf3.show();
                _0x3873aa.show();
                _0x316867.show();
                _0x18aee5.show();
                _0x496131.show();
                _0x371bfe.show();
                _0x36c824.show();
                _0x36f60d.show();
                _0x149097.hide();
                _0x2efb3b.show();
              } else {
                if (_0x538222 == 'folder_video' || _0x538222 == 'folder_audio') {
                  _0x1100bc.show();
                  _0x3dccd5.attr("ap-required", true);
                  _0xa2ef62.show();
                  _0x9be9dc.show();
                  _0x14844d.show();
                  _0x35a4ff.show();
                  _0x5a7575.show();
                  _0x4a6733.show();
                  _0x34dbf3.show();
                  _0x496131.show();
                  _0x371bfe.show();
                  _0x36c824.show();
                  _0x9be7f5.show();
                  _0x5acc7b.show();
                  if (_0x538222 == "folder_video") {
                    _0xbd000e.show();
                  } else {
                    if (_0x538222 == "folder_audio") {
                      _0x512497.show();
                    }
                  }
                } else {
                  if (_0x538222 == 'image') {
                    _0x1100bc.show();
                    _0x3dccd5.attr("ap-required", true);
                    _0x57de00.show();
                    _0x3187e9.show();
                    _0x3494c1.show();
                    _0x34213c.show();
                    _0x22bb41.show();
                    _0x11e6f6.show();
                    _0x14844d.show();
                    _0x35a4ff.show();
                    _0x7fb69e.show();
                    _0x4a3a32('.duration-media-info').hide();
                    _0x4a3a32(".duration-image-info").show();
                    _0x18aee5.show();
                    _0x496131.show();
                    _0x371bfe.show();
                    _0x36c824.show();
                    _0xbd000e.show();
                    _0x9be7f5.show();
                    _0x20ad94.show();
                  } else {
                    if (_0x538222 == 'folder_image') {
                      _0x1100bc.show();
                      _0x3dccd5.attr('ap-required', true);
                      _0xa2ef62.show();
                      _0x9be9dc.show();
                      _0x5acc7b.show();
                      _0x14844d.show();
                      _0x35a4ff.show();
                    } else {
                      if (_0x538222 == "gdrive_folder") {
                        _0x1100bc.show();
                        _0x3dccd5.attr("ap-required", true);
                        _0x83c345.show();
                        _0x29d466.show();
                        _0x14844d.show();
                        _0xbd000e.show();
                      } else {
                        if (_0x538222 == "onedrive_folder") {
                          _0x1100bc.show();
                          _0x3dccd5.attr("ap-required", true);
                          _0x690156.show();
                          _0x296dbb.show();
                          _0x14844d.show();
                          _0xbd000e.show();
                        } else {
                          if (_0x538222 == "youtube_single") {
                            _0x1100bc.show();
                            _0x3dccd5.attr('ap-required', true);
                            _0x35a4ff.show();
                            _0x34c1e7.show();
                            _0x3494c1.show();
                            _0x34213c.show();
                            _0x22bb41.show();
                            _0x11e6f6.show();
                            _0x1e3b61.show();
                            _0x5a7575.show();
                            _0x4a6733.show();
                            _0x34dbf3.show();
                            _0x7fb69e.show();
                            _0x18aee5.show();
                            _0x496131.show();
                            _0x371bfe.show();
                            _0x36c824.show();
                            _0x3873aa.show();
                            _0x263758.show();
                            _0xbd000e.show();
                            _0x1b9cb2.show();
                            _0x38792b.show();
                            _0x29a61c.show();
                          } else {
                            if (_0x538222 == 'youtube_single_list') {
                              _0x1100bc.show();
                              _0x3dccd5.attr("ap-required", true);
                              _0x34c1e7.show();
                              _0x5a7575.show();
                              _0x4a6733.show();
                              _0x34dbf3.show();
                              _0x496131.show();
                              _0x371bfe.show();
                              _0x36c824.show();
                              _0x3873aa.show();
                              _0x1b9cb2.show();
                              _0xbd000e.show();
                              _0x38792b.show();
                              _0x174c61.show();
                            } else {
                              if (_0x538222 == 'youtube_playlist' || _0x538222 == "youtube_playlist_backend") {
                                _0x1100bc.show();
                                _0x3dccd5.attr("ap-required", true);
                                _0x34c1e7.show();
                                _0xa2ef62.show();
                                _0x5a7575.show();
                                _0x44de76.show();
                                _0x496131.show();
                                _0x371bfe.show();
                                _0x36c824.show();
                                _0x3e9ef5.show();
                                _0x38792b.show();
                                _0x5d3e05.show();
                                if (_0x538222 == "youtube_playlist_backend") {
                                  _0x49e758.show();
                                  _0x44de76.hide();
                                  _0xc7ae14.hide();
                                }
                              } else {
                                if (_0x538222 == 'youtube_channel' || _0x538222 == "youtube_channel_backend") {
                                  _0x1100bc.show();
                                  _0x3dccd5.attr("ap-required", true);
                                  _0x34c1e7.show();
                                  _0xa2ef62.show();
                                  _0x14844d.show();
                                  _0x5a7575.show();
                                  _0x4a6733.show();
                                  _0x34dbf3.show();
                                  _0x44de76.show();
                                  _0x496131.show();
                                  _0x371bfe.show();
                                  _0x36c824.show();
                                  _0x3e9ef5.show();
                                  _0x38792b.show();
                                  _0x548cbe.show();
                                  if (_0x538222 == 'youtube_channel_backend') {
                                    _0x49e758.show();
                                    _0x44de76.hide();
                                    _0xc7ae14.hide();
                                  }
                                } else {
                                  if (_0x538222 == "vimeo_single") {
                                    _0x1100bc.show();
                                    _0x3dccd5.attr("ap-required", true);
                                    _0x35a4ff.show();
                                    _0x3494c1.show();
                                    _0x34213c.show();
                                    _0x22bb41.show();
                                    _0x11e6f6.show();
                                    _0x1e3b61.show();
                                    _0x5a7575.show();
                                    _0x4a6733.show();
                                    _0x34dbf3.show();
                                    _0x7fb69e.show();
                                    _0x263758.show();
                                    _0xbd000e.show();
                                    _0x18aee5.show();
                                    _0x496131.show();
                                    _0x52131f.show();
                                    _0x371bfe.show();
                                    _0x36c824.show();
                                    _0x3873aa.show();
                                    _0x1b9cb2.show();
                                    _0x38792b.show();
                                    _0x195693.show();
                                  } else {
                                    if (_0x538222 == "vimeo_single_list") {
                                      _0x1100bc.show();
                                      _0x3dccd5.attr("ap-required", true);
                                      _0x5a7575.show();
                                      _0x4a6733.show();
                                      _0x34dbf3.show();
                                      _0x496131.show();
                                      _0x52131f.show();
                                      _0x371bfe.show();
                                      _0x36c824.show();
                                      _0x3873aa.show();
                                      _0x1b9cb2.show();
                                      _0xbd000e.show();
                                      _0x38792b.show();
                                      _0x33e836.show();
                                    } else {
                                      if (_0x538222 == 'vimeo_group') {
                                        _0x1100bc.show();
                                        _0x3dccd5.attr("ap-required", true);
                                        _0xa2ef62.show();
                                        _0x5a7575.show();
                                        _0x4a6733.show();
                                        _0x34dbf3.show();
                                        _0x44de76.show();
                                        _0x496131.show();
                                        _0x52131f.show();
                                        _0x371bfe.show();
                                        _0x36c824.show();
                                        _0x3e9ef5.show();
                                        _0x38792b.show();
                                        _0x592fbc.show();
                                        _0x2fc2b8.show();
                                        _0x3d7237.show();
                                      } else {
                                        if (_0x538222 == 'vimeo_channel') {
                                          _0x1100bc.show();
                                          _0x3dccd5.attr("ap-required", true);
                                          _0xa2ef62.show();
                                          _0x5a7575.show();
                                          _0x4a6733.show();
                                          _0x34dbf3.show();
                                          _0x44de76.show();
                                          _0x496131.show();
                                          _0x52131f.show();
                                          _0x371bfe.show();
                                          _0x36c824.show();
                                          _0x3e9ef5.show();
                                          _0x38792b.show();
                                          _0x3dd691.show();
                                          _0x310a5d.show();
                                          _0x3d7237.show();
                                        } else {
                                          if (_0x538222 == "vimeo_user_album") {
                                            _0x563051.show();
                                            _0x30b799.attr("ap-required", true);
                                            _0x1100bc.show();
                                            _0x3dccd5.attr('ap-required', true);
                                            _0xa2ef62.show();
                                            _0x5a7575.show();
                                            _0x4a6733.show();
                                            _0x34dbf3.show();
                                            _0x44de76.show();
                                            _0x496131.show();
                                            _0x52131f.show();
                                            _0x371bfe.show();
                                            _0x36c824.show();
                                            _0x3e9ef5.show();
                                            _0x38792b.show();
                                            _0x50207f.show();
                                            _0x45fc61.show();
                                            _0x3d7237.show();
                                          } else {
                                            if (_0x538222 == 'vimeo_album') {
                                              _0x1100bc.show();
                                              _0x3dccd5.attr("ap-required", true);
                                              _0xa2ef62.show();
                                              _0x5a7575.show();
                                              _0x4a6733.show();
                                              _0x34dbf3.show();
                                              _0x44de76.show();
                                              _0x496131.show();
                                              _0x52131f.show();
                                              _0x371bfe.show();
                                              _0x36c824.show();
                                              _0x3e9ef5.show();
                                              _0x38792b.show();
                                              _0x50207f.show();
                                              _0x45fc61.show();
                                              _0x3d7237.show();
                                            } else {
                                              if (_0x538222 == "vimeo_user_videos") {
                                                _0x563051.show();
                                                _0x30b799.attr("ap-required", true);
                                                _0xa2ef62.show();
                                                _0x5a7575.show();
                                                _0x4a6733.show();
                                                _0x34dbf3.show();
                                                _0x44de76.show();
                                                _0x496131.show();
                                                _0x52131f.show();
                                                _0x371bfe.show();
                                                _0x36c824.show();
                                                _0x3e9ef5.show();
                                                _0x38792b.show();
                                              } else {
                                                if (_0x538222 == "vimeo_ondemand") {
                                                  _0x1100bc.show();
                                                  _0x3dccd5.attr("ap-required", true);
                                                  _0xa2ef62.show();
                                                  _0x5a7575.show();
                                                  _0x4a6733.show();
                                                  _0x34dbf3.show();
                                                  _0x44de76.show();
                                                  _0x496131.show();
                                                  _0x52131f.show();
                                                  _0x371bfe.show();
                                                  _0x36c824.show();
                                                  _0x3e9ef5.show();
                                                  _0x38792b.show();
                                                  _0x38451b.show();
                                                  _0x3588ef.show();
                                                  _0x3d7237.show();
                                                } else {
                                                  if (_0x538222 == "vimeo_folder") {
                                                    _0x1100bc.show();
                                                    _0x3dccd5.attr("ap-required", true);
                                                    _0x563051.show();
                                                    _0x30b799.attr("ap-required", true);
                                                    _0xa2ef62.show();
                                                    _0x5a7575.show();
                                                    _0x4a6733.show();
                                                    _0x34dbf3.show();
                                                    _0x44de76.show();
                                                    _0x496131.show();
                                                    _0x52131f.show();
                                                    _0x371bfe.show();
                                                    _0x36c824.show();
                                                    _0x3e9ef5.show();
                                                    _0x38792b.show();
                                                    _0x584e19.show();
                                                    _0x4324dc.show();
                                                    _0x3d7237.show();
                                                  } else {
                                                    if (_0x538222 == "custom_html") {
                                                      _0x1100bc.show();
                                                      _0x3dccd5.attr('ap-required', true);
                                                      _0x1e3b61.show();
                                                      _0x204b2f.show();
                                                      _0x3494c1.show();
                                                      _0x34213c.show();
                                                      _0x22bb41.show();
                                                      _0x11e6f6.show();
                                                      _0x18aee5.show();
                                                      _0x7fb69e.show();
                                                      _0x4a3a32('.duration-media-info').hide();
                                                      _0x4a3a32(".duration-image-info").show();
                                                    } else {
                                                      if (_0x538222 == 'custom') {
                                                        _0x1100bc.show();
                                                        _0x3dccd5.attr('ap-required', true);
                                                        _0x57de00.show();
                                                        _0x1e3b61.show();
                                                        _0x97313d.show();
                                                        _0x3494c1.show();
                                                        _0x34213c.show();
                                                        _0x22bb41.show();
                                                        _0x11e6f6.show();
                                                        _0x18aee5.show();
                                                        _0x7fb69e.show();
                                                        _0x4a3a32('.duration-media-info').hide();
                                                        _0x4a3a32(".duration-image-info").show();
                                                      } else {
                                                        if (_0x538222 == "xml") {
                                                          _0x1100bc.show();
                                                          _0x3dccd5.attr('ap-required', true);
                                                          _0x57de00.show();
                                                          _0x49df1f.show();
                                                        } else if (_0x538222 == "json") {
                                                          _0x1100bc.show();
                                                          _0x3dccd5.attr("ap-required", true);
                                                          _0x57de00.show();
                                                          _0x30429b.show();
                                                        }
                                                      }
                                                    }
                                                  }
                                                }
                                              }
                                            }
                                          }
                                        }
                                      }
                                    }
                                  }
                                }
                              }
                            }
                          }
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
    _0x43e0f6 = true;
  });
  function _0x5e9fef(_0x27ea03) {
    _0x27ea03.find("input:text, input:password, input:file, input:hidden, select, textarea").val('');
    _0x27ea03.find("input:radio, input:checkbox").removeAttr("checked").removeAttr("selected");
    _0x27ea03.find(".mvp-img-preview").attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
  }
  function _0x342f9a(_0x18cc17, _0x2459a7) {
    var _0x169e6e = _0x2459a7.data;
    _0xffee3e.val(_0x169e6e.type);
    _0xffee3e.change();
    if (_0x18cc17 == "add") {
      _0x20edda.find("#type").attr('disabled', false);
    } else {
      _0x20edda.find("#type").attr("disabled", true);
    }
    var _0x2bb690;
    if (_0x169e6e.disabled == '1' || _0x169e6e.disabled == '0') {
      _0x2bb690 = _0x169e6e.disabled;
    } else {
      _0x2bb690 = '0';
    }
    _0x30a47e.val(_0x2bb690);
    if (_0x538222 == 'video' || _0x538222 == 'audio') {
      var _0x57b66f;
      var _0x47f693 = _0x2459a7.multi_path_query_result.length;
      var _0x27ccc2;
      var _0x3d653a;
      for (_0x57b66f = 0x0; _0x57b66f < _0x47f693; _0x57b66f++) {
        _0x3d653a = _0x2459a7.multi_path_query_result[_0x57b66f];
        _0x27ccc2 = _0x3c014c.find('.multi_path_section_orig').clone().removeClass('multi_path_section_orig').addClass('multi_path_section').insertBefore(_0x3c014c.find(".multi_path_section_orig"));
        _0x27ccc2.find(".multi_path_field_remove").show();
        _0x27ccc2.find(".multi_path").val(_0x3d653a.path);
        _0x27ccc2.find(".quality_title").val(_0x3d653a.quality_title);
        if (_0x3d653a.def && _0x3d653a.def == _0x3d653a.quality_title) {
          _0x27ccc2.find(".quality_default").prop("checked", 'checked');
        }
        if (_0x3d653a.defMobile && _0x3d653a.defMobile == _0x3d653a.quality_title) {
          _0x27ccc2.find(".quality_mobile_default").prop("checked", "checked");
        }
      }
    } else {
      if (_0x2459a7.multi_path_query_result.length) {
        var _0x3d653a = _0x2459a7.multi_path_query_result[0x0];
        _0x3dccd5.val(_0x3d653a.path);
        if (_0x3d653a.mp4) {
          _0xa46672.val(_0x3d653a.mp4);
        }
      }
    }
    if (_0x169e6e.exclude) {
      _0x2da2e5.val(_0x169e6e.exclude);
    }
    if (_0x169e6e.bkey) {
      _0x524c4a.val(_0x169e6e.bkey);
    }
    if (_0x169e6e.folder_custom_url == '1') {
      _0x1fa62a.prop("checked", true);
    }
    if (_0x169e6e.id3) {
      _0xeeef9d.val(_0x169e6e.id3);
    }
    if (_0x169e6e.folder_sort) {
      _0x2b443e.val(_0x169e6e.folder_sort);
    }
    if (_0x169e6e.gdrive_sort) {
      _0x1f292f.val(_0x169e6e.gdrive_sort);
    }
    if (_0x169e6e.onedrive_sort) {
      _0x40a10b.val(_0x169e6e.onedrive_sort);
    }
    if (_0x169e6e.user_id) {
      _0x30b799.val(_0x169e6e.user_id);
    }
    if (_0x169e6e.limit) {
      _0x3b107e.val(_0x169e6e.limit);
    }
    if (_0x169e6e.yt_sort) {
      _0x5b7d8e.val(_0x169e6e.yt_sort);
    }
    if (_0x169e6e.vimeo_channel_sort) {
      _0x337c00.val(_0x169e6e.vimeo_channel_sort);
    }
    if (_0x169e6e.vimeo_album_sort) {
      _0x1de2dc.val(_0x169e6e.vimeo_album_sort);
    }
    if (_0x169e6e.vimeo_group_sort) {
      _0x303e4e.val(_0x169e6e.vimeo_group_sort);
    }
    if (_0x169e6e.vimeo_ondemand_sort) {
      _0x546dfb.val(_0x169e6e.vimeo_ondemand_sort);
    }
    if (_0x169e6e.vimeo_folder_sort) {
      _0x3545ac.val(_0x169e6e.vimeo_folder_sort);
    }
    if (_0x169e6e.vimeo_sort_dir) {
      _0x3dacf3.val(_0x169e6e.vimeo_sort_dir);
    }
    if (_0x169e6e.load_more) {
      _0x329615.val(_0x169e6e.load_more);
    }
    if (_0x169e6e.is360) {
      _0x185899.val(_0x169e6e.is360);
    }
    if (_0x169e6e.vrMode) {
      _0x12a49e.val(_0x169e6e.vrMode);
    }
    if (_0x169e6e.noapi) {
      _0x28e887.val(_0x169e6e.noapi);
    }
    if (_0x169e6e.islive) {
      _0xbc030c.val(_0x169e6e.islive);
    }
    if (_0x169e6e.lock_time != undefined) {
      _0x2fa6e8.val(_0x169e6e.lock_time);
    }
    if (_0x169e6e.pi_icons) {
      var _0x57b66f;
      var _0x47f693 = _0x169e6e.pi_icons.length;
      for (_0x57b66f = 0x0; _0x57b66f < _0x47f693; _0x57b66f++) {
        _0x5844ed(_0x169e6e.pi_icons[_0x57b66f]);
      }
      _0x1098fe.show();
    }
    if (_0x169e6e.poster) {
      _0x443919.val(_0x169e6e.poster);
      _0x248b13.attr("src", _0x169e6e.poster);
    }
    if (_0x169e6e.slideshow_images) {
      var _0x57b66f;
      var _0x3ff9a9 = _0x169e6e.slideshow_images.split(',');
      var _0x47f693 = _0x3ff9a9.length;
      for (_0x57b66f = 0x0; _0x57b66f < _0x47f693; _0x57b66f++) {
        _0x397b46.append("<span class=\"slideshow-img-wrap\"><button type=\"button\" class=\"slideshow-img-remove\">Remove</button><img class=\"slideshow-img\" src=\"" + _0x3ff9a9[_0x57b66f] + "\" alt=\"image\"/></span>");
      }
      _0x40879c();
    }
    if (_0x169e6e.poster_frame_time != undefined) {
      _0x289ce6.val(_0x169e6e.poster_frame_time);
    }
    if (_0x169e6e.thumb) {
      _0x50d2e3.val(_0x169e6e.thumb);
      _0x14d068.attr("src", _0x169e6e.thumb);
    }
    if (_0x169e6e.alt_text) {
      _0x28d090.val(_0x169e6e.alt_text);
    }
    if (_0x169e6e.hover_preview) {
      _0x1147d8.val(_0x169e6e.hover_preview);
    }
    if (_0x169e6e.title) {
      _0x4bfff2.val(_0x169e6e.title);
    }
    if (_0x169e6e.description) {
      _0x5b62a1.val(_0x169e6e.description);
    }
    if (_0x169e6e.download) {
      _0x3da10c.val(_0x169e6e.download);
    }
    if (_0x169e6e.start) {
      _0x41bf1a.val(_0x169e6e.start);
    }
    if (_0x169e6e.end) {
      _0x4d9556.val(_0x169e6e.end);
    }
    if (_0x169e6e.playback_rate) {
      _0x4f5562.val(_0x169e6e.playback_rate);
    }
    if (_0x169e6e.preview_seek) {
      _0x287453.val(_0x169e6e.preview_seek);
    }
    if (_0x169e6e.chapters) {
      _0x627d74.val(_0x169e6e.chapters);
    }
    if (_0x169e6e.chapters_cors) {
      _0x48717e.prop("checked", 'checked');
    }
    if (_0x169e6e.vast) {
      _0x276d91.val(_0x169e6e.vast);
    }
    if (_0x2459a7.subtitle) {
      var _0x57b66f;
      var _0x47f693 = _0x2459a7.subtitle.length;
      var _0x27ccc2;
      var _0x3d653a;
      for (_0x57b66f = 0x0; _0x57b66f < _0x47f693; _0x57b66f++) {
        _0x3d653a = _0x2459a7.subtitle[_0x57b66f];
        _0x27ccc2 = _0x3c014c.find('.subtitle_section_orig').clone().removeClass("subtitle_section_orig").addClass('subtitle_section').insertBefore(_0x3c014c.find(".subtitle_section_orig"));
        _0x27ccc2.find(".subtitle_src").val(_0x3d653a.src);
        _0x27ccc2.find(".subtitle_label").val(_0x3d653a.label);
        if (_0x3d653a.def && _0x3d653a.def == _0x3d653a.label) {
          _0x27ccc2.find(".subtitle_default").prop("checked", "checked");
        }
        if (_0x3d653a.cors) {
          _0x27ccc2.find(".subtitle_cors").prop('checked', 'checked');
        }
      }
    }
    if (_0x169e6e.duration) {
      _0x501b29.val(_0x169e6e.duration);
    }
    if (_0x169e6e.link) {
      _0x327ff5.val(_0x169e6e.link);
    }
    if (_0x169e6e.target) {
      _0x1c8ae6.val(_0x169e6e.target);
    }
    if (_0x169e6e.end_link) {
      _0x2fc0c1.val(_0x169e6e.end_link);
    }
    if (_0x169e6e.end_target) {
      _0x70d6dd.val(_0x169e6e.end_target);
    }
    if (_0x169e6e.pwd) {
      _0x3358e6.val(_0x169e6e.pwd);
    }
    if (_0x169e6e.vpwd) {
      _0x5beb05.val(_0x169e6e.vpwd);
    }
    if (_0x169e6e.age_verify) {
      _0x5d923b.val(_0x169e6e.age_verify);
    }
    if (_0x169e6e.width) {
      _0x38792b.find("#width").val(_0x169e6e.width);
    }
    if (_0x169e6e.height) {
      _0x38792b.find("#height").val(_0x169e6e.height);
    }
    if (_0x2459a7.ad_data) {
      var _0x57b66f;
      var _0x47f693 = _0x2459a7.ad_data.length;
      var _0x3d653a;
      if (_0x47f693 > 0x0) {
        for (_0x57b66f = 0x0; _0x57b66f < _0x47f693; _0x57b66f++) {
          _0x3d653a = _0x2459a7.ad_data[_0x57b66f];
          _0x393784.addAdSource(_0x3d653a.ad_type, _0x3d653a, true);
        }
      }
    }
    _0x393784.setRandomize(_0x169e6e);
    if (_0x2459a7.annotation_data) {
      var _0x57b66f;
      var _0x47f693 = _0x2459a7.annotation_data.length;
      var _0x3d653a;
      if (_0x47f693 > 0x0) {
        for (_0x57b66f = 0x0; _0x57b66f < _0x47f693; _0x57b66f++) {
          _0x3d653a = _0x2459a7.annotation_data[_0x57b66f];
          _0x393784.addAnnotationSource(_0x3d653a, true);
        }
      }
    }
  }
  var _0x283b9f = _0x4a3a32('.mvp-get-video-shortcode-submit');
  if (_0x283b9f.length) {
    _0x2ff73d.click();
    _0xffee3e.change();
  }
  var _0x1e897a = [{
    'btn': _0x433e8c.find("#path_upload"),
    'manager': null
  }, {
    'btn': _0x433e8c.find("#poster_upload"),
    'manager': null
  }, {
    'btn': _0x433e8c.find("#slideshow_upload"),
    'manager': null
  }, {
    'btn': _0x433e8c.find('#thumb_upload'),
    'manager': null
  }, {
    'btn': _0x433e8c.find("#download_upload"),
    'manager': null
  }, {
    'btn': _0x433e8c.find("#preview_seek_upload"),
    'manager': null
  }, {
    'btn': _0x433e8c.find("#hover_preview_upload"),
    'manager': null
  }, {
    'btn': _0x433e8c.find('#chapters_upload'),
    'manager': null
  }, {
    'btn': _0x433e8c.find("#vast_upload"),
    'manager': null
  }, {
    'btn': _0x544184.find("#pl_thumb_upload"),
    'manager': null
  }];
  _0x33b84b(_0x1e897a);
  function _0x33b84b(_0xf28334) {
    var _0x406daf;
    var _0x268284 = _0xf28334.length;
    var _0x4ffaa5;
    for (_0x406daf = 0x0; _0x406daf < _0x268284; _0x406daf++) {
      _0x4ffaa5 = _0xf28334[_0x406daf].btn.attr("data-id", _0x406daf);
      _0x4ffaa5.on("click", function (_0x4141fb) {
        _0x4141fb.preventDefault();
        var _0x402aaf;
        var _0x3cdd6e;
        var _0x1ed848 = _0x4a3a32(this).attr('id');
        var _0x2e2086 = parseInt(_0x4a3a32(this).attr("data-id"), 0xa);
        var _0x2485d8;
        var _0x236115;
        if (uploadManagerArr[_0x2e2086].manager) {
          uploadManagerArr[_0x2e2086].manager.open();
          return;
        }
        if (_0x1ed848 == "path_upload") {
          if (_0x538222 == "image") {
            _0x402aaf = "image";
          } else {
            if (_0x538222 == "hls" || _0x538222 == 'dash') {
              _0x402aaf = '';
            } else {
              if (_0x538222 == "xml" || _0x538222 == "json") {
                _0x402aaf = "application/xml,application/json,text/*";
              }
            }
          }
          _0x3cdd6e = _0x3dccd5;
        } else {
          if (_0x1ed848 == "thumb_upload") {
            _0x402aaf = "image";
            _0x3cdd6e = _0x50d2e3;
          } else {
            if (_0x1ed848 == "poster_upload") {
              _0x402aaf = "image";
              _0x3cdd6e = _0x443919;
            } else {
              if (_0x1ed848 == "slideshow_upload") {
                _0x402aaf = 'image';
                _0x3cdd6e = _0x397b46;
                _0x236115 = true;
              } else {
                if (_0x1ed848 == "download_upload") {
                  _0x402aaf = '';
                  _0x3cdd6e = _0x3da10c;
                } else {
                  if (_0x1ed848 == "preview_seek_upload") {
                    _0x402aaf = '';
                    _0x3cdd6e = _0x287453;
                  } else {
                    if (_0x1ed848 == "hover_preview_upload") {
                      _0x402aaf = "image/gif, video";
                      _0x3cdd6e = _0x1147d8;
                    } else {
                      if (_0x1ed848 == "chapters_upload") {
                        _0x402aaf = '';
                        _0x3cdd6e = _0x627d74;
                      } else {
                        if (_0x1ed848 == 'vast_upload') {
                          _0x402aaf = '';
                          _0x3cdd6e = _0x276d91;
                        } else if (_0x1ed848 == 'pl_thumb_upload') {
                          _0x402aaf = "image";
                          _0x3cdd6e = "#pl_thumb";
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
        _0x2485d8 = wp.media({
          'library': {
            'type': _0x402aaf
          },
          'multiple': _0x236115
        }).on("select", function () {
          if (_0x236115) {
            var _0x2ee5e4 = _0x2485d8.state().get("selection").map(function (_0x38560a) {
              _0x38560a.toJSON();
              return _0x38560a;
            });
            if (_0x3cdd6e == _0x397b46) {
              var _0x3d9e89;
              var _0x4b7d77;
              var _0x561a74 = _0x2ee5e4.length;
              for (_0x3d9e89 = 0x0; _0x3d9e89 < _0x561a74; _0x3d9e89++) {
                _0x4b7d77 = _0x2ee5e4[_0x3d9e89].attributes;
                _0x397b46.append("<span class=\"slideshow-img-wrap\"><button type=\"button\" class=\"slideshow-img-remove\">Remove</button><img class=\"slideshow-img\" src=\"" + _0x4b7d77.url + "\" alt=\"image\"/></span>");
              }
              _0x40879c();
            }
          } else {
            var _0x4b7d77 = _0x2485d8.state().get("selection").first().toJSON();
            _0x4a3a32(_0x3cdd6e).val(_0x4b7d77.url);
            if (_0x3cdd6e == _0x3dccd5) {
              _0x3187e9.show();
            } else {
              if (_0x3cdd6e == _0x50d2e3) {
                _0x14d068.attr("src", _0x4b7d77.url);
                _0x63af27.show();
              } else {
                if (_0x3cdd6e == _0x443919) {
                  _0x248b13.attr('src', _0x4b7d77.url);
                  _0x6c03ca.show();
                } else if (_0x3cdd6e == "#pl_thumb") {
                  _0x431098.attr("src", _0x4b7d77.url);
                  _0x53929f.show();
                }
              }
            }
          }
        }).open();
        uploadManagerArr[_0x2e2086].manager = _0x2485d8;
      });
    }
  }
  _0x4a3a32("#mvp-domain-rename").on("click", function (_0x3ef6e9) {
    var _0x48a6b8 = _0x4a3a32("#mvp-domain-rename-from").val();
    var _0x47669a = _0x4a3a32("#mvp-domain-rename-to").val();
    if (!(_0x48a6b8.replace(/^\s+|\s+$/g, '').length == 0x0) && !(_0x47669a.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      var _0x765472 = confirm(_0x571282.attr('data-sure-to-rename'));
      if (_0x765472) {
        _0x1294db.show();
        var _0x1ff5bf = [{
          'name': 'action',
          'value': "mvp_domain_rename"
        }, {
          'name': "playlist_id",
          'value': _0x29ee86
        }, {
          'name': 'from',
          'value': _0x48a6b8
        }, {
          'name': 'to',
          'value': _0x47669a
        }, {
          'name': "security",
          'value': mvp_data.security
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': "post",
          'data': _0x1ff5bf,
          'dataType': "json"
        }).done(function (_0x1c5ecf) {
          var _0x51a9b2;
          var _0x151cf4;
          _0x201a2f.find(".media-item").each(function () {
            _0x51a9b2 = _0x4a3a32(this);
            _0x151cf4 = _0x51a9b2.find(".media-path").html();
            _0x151cf4 = _0x151cf4.replace(_0x48a6b8, _0x47669a);
            _0x51a9b2.find(".media-path").html(_0x151cf4);
            _0x151cf4 = _0x51a9b2.find(".mvp-media-thumb-img").attr('src');
            _0x151cf4 = _0x151cf4.replace(_0x48a6b8, _0x47669a);
            _0x51a9b2.find(".mvp-media-thumb-img").attr("src", _0x151cf4);
          });
          _0x1294db.hide();
        }).fail(function (_0x4574de, _0x120a85, _0x213dba) {
          console.log(_0x4574de.responseText, _0x120a85, _0x213dba);
          _0x1294db.hide();
        });
      }
    }
  });
  _0x4a3a32(".mvp-table").on("click", ".mvp-export-playlist-btn", function () {
    _0x1294db.show();
    var _0x204354 = _0x4a3a32(this).attr("data-playlist-id");
    var _0x22bbaf = _0x4a3a32(this).closest(".mvp-playlist-row").find(".title-editable").val();
    _0x22bbaf = _0x22bbaf.replace(/\W/g, '');
    var _0x84bac4 = [{
      'name': "action",
      'value': "mvp_export_playlist"
    }, {
      'name': "playlist_id",
      'value': _0x204354
    }, {
      'name': "playlist_title",
      'value': _0x22bbaf
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x84bac4,
      'dataType': "json"
    }).done(function (_0x214e71) {
      _0x1294db.hide();
      if (_0x214e71.zip) {
        location.href = _0x214e71.zip;
        var _0x324214 = [{
          'name': 'action',
          'value': "mvp_clean_export"
        }, {
          'name': "zipname",
          'value': _0x214e71.zip_clean
        }, {
          'name': 'security',
          'value': mvp_data.security
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': "post",
          'data': _0x324214
        });
      }
    }).fail(function (_0x412595, _0x448899, _0x404595) {
      console.log(_0x412595.responseText, _0x448899, _0x404595);
      _0x1294db.hide();
    });
    return false;
  });
  var _0x83ecde = _0x4a3a32("#mvp-playlist-file-input").on("change", _0x406018);
  var _0x9a8c19 = _0x4a3a32("#mvp-import-playlist").click(function () {
    _0x83ecde.trigger("click");
    return false;
  });
  var _0x292da4;
  function _0x406018(_0x2d479a) {
    if (_0x2d479a.target.files.length == 0x0) {
      return;
    }
    var _0x311ca1 = _0x2d479a.target.files[0x0].name;
    if (_0x311ca1.indexOf('mvp_playlist_id_') == -0x1) {
      alert(_0x571282.attr("data-upload-previously-exported-playlist-zip"));
      return;
    }
    _0x1294db.show();
    _0x9a8c19.css("display", "none");
    var _0x3f8e8a = _0x2d479a.target.files;
    var _0x6e06f2 = new FormData();
    _0x4a3a32.each(_0x3f8e8a, function (_0x5aad1a, _0x4a9a93) {
      _0x6e06f2.append("mvp_file_upload", _0x4a9a93);
    });
    _0x6e06f2.append('action', "mvp_import_playlist");
    _0x6e06f2.append("security", mvp_data.security);
    _0x83ecde.val('');
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x6e06f2,
      'dataType': "json",
      'processData': false,
      'contentType': false
    }).done(function (_0x1f54ab) {
      console.log(_0x1f54ab);
      if (_0x1f54ab.playlist) {
        _0x292da4 = {};
        _0x292da4.playlist = {
          'data': null,
          'url': _0x1f54ab.playlist
        };
        if (_0x1f54ab.media) {
          _0x292da4.media = {
            'data': null,
            'url': _0x1f54ab.media
          };
        }
        if (_0x1f54ab.path) {
          _0x292da4.path = {
            'data': null,
            'url': _0x1f54ab.path
          };
        }
        if (_0x1f54ab.subtitle) {
          _0x292da4.subtitle = {
            'data': null,
            'url': _0x1f54ab.subtitle
          };
        }
        if (_0x1f54ab.ad) {
          _0x292da4.ad = {
            'data': null,
            'url': _0x1f54ab.ad
          };
        }
        if (_0x1f54ab.annotation) {
          _0x292da4.annotation = {
            'data': null,
            'url': _0x1f54ab.annotation
          };
        }
        _0xc4e59b(_0x292da4.playlist.url);
      } else {
        _0x9a8c19.css('display', "inline-block");
        _0x1294db.hide();
        alert(_0x571282.attr("data-error-importing"));
      }
    }).fail(function (_0x3bec29, _0x282f34, _0x587a16) {
      console.log(_0x3bec29.responseText, _0x282f34, _0x587a16);
      _0x9a8c19.css("display", 'inline-block');
      _0x1294db.hide();
      alert(_0x571282.attr('data-error-importing'));
    });
  }
  function _0xc4e59b(_0x41a6fd) {
    if (typeof _0x4a3a32.csv === 'undefined') {
      var _0x42467d = document.createElement("script");
      _0x42467d.type = 'text/javascript';
      _0x42467d.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js";
      _0x42467d.onload = _0x42467d.onreadystatechange = function () {
        if (!this.readyState || this.readyState == "complete") {
          _0xc4e59b(_0x41a6fd);
        }
      };
      _0x42467d.onerror = function () {
        console.log("Error loading " + this.src);
      };
      var _0x34709f = document.getElementsByTagName("script")[0x0];
      _0x34709f.parentNode.insertBefore(_0x42467d, _0x34709f);
    } else {
      _0x4a3a32.ajax({
        'type': "GET",
        'url': _0x41a6fd,
        'dataType': "text"
      }).done(function (_0x273d57) {
        if (_0x292da4.playlist.data == null) {
          var _0x55a093 = _0x4a3a32.csv.toArray(_0x273d57, {
            'separator': '|',
            'delimiter': '^'
          }, function (_0x1f30f6, _0x4442cd) {
            _0x292da4.playlist.data = _0x4442cd;
            if (_0x292da4.media) {
              _0xc4e59b(_0x292da4.media.url);
            } else {
              _0x45dfe7();
            }
          });
        } else {
          if (_0x292da4.media.data == null) {
            var _0x55a093 = _0x4a3a32.csv.toArrays(_0x273d57, {
              'separator': '|',
              'delimiter': '^'
            }, function (_0x493cb6, _0x5acada) {
              _0x292da4.media.data = _0x5acada;
              if (_0x292da4.path) {
                _0xc4e59b(_0x292da4.path.url);
              } else {
                _0x45dfe7();
              }
            });
          } else {
            if (_0x292da4.path.data == null) {
              var _0x55a093 = _0x4a3a32.csv.toArrays(_0x273d57, {
                'separator': '|',
                'delimiter': '^'
              }, function (_0x2163a2, _0x2052fd) {
                _0x292da4.path.data = _0x2052fd;
                if (_0x292da4.subtitle) {
                  _0xc4e59b(_0x292da4.subtitle.url);
                } else {
                  _0x45dfe7();
                }
              });
            } else {
              if (_0x292da4.subtitle.data == null) {
                var _0x55a093 = _0x4a3a32.csv.toArrays(_0x273d57, {
                  'separator': '|',
                  'delimiter': '^'
                }, function (_0x2f0e97, _0x8d4c69) {
                  _0x292da4.subtitle.data = _0x8d4c69;
                  if (_0x292da4.ad) {
                    _0xc4e59b(_0x292da4.ad.url);
                  } else {
                    _0x45dfe7();
                  }
                });
              } else {
                if (_0x292da4.ad.data == null) {
                  var _0x55a093 = _0x4a3a32.csv.toArrays(_0x273d57, {
                    'separator': '|',
                    'delimiter': '^'
                  }, function (_0x2929ee, _0x3846ad) {
                    _0x292da4.ad.data = _0x3846ad;
                    if (_0x292da4.annotation) {
                      _0xc4e59b(_0x292da4.annotation.url);
                    } else {
                      _0x45dfe7();
                    }
                  });
                } else {
                  if (_0x292da4.annotation.data == null) {
                    var _0x55a093 = _0x4a3a32.csv.toArrays(_0x273d57, {
                      'separator': '|',
                      'delimiter': '^'
                    }, function (_0x76aa8a, _0x17adb8) {
                      _0x292da4.annotation.data = _0x17adb8;
                      _0x45dfe7();
                    });
                  }
                }
              }
            }
          }
        }
      }).fail(function (_0x4943af, _0x3b7ccb, _0x481ebd) {
        console.log("Error process CSV: " + _0x4943af, _0x3b7ccb, _0x481ebd);
        _0x1294db.hide();
        _0x9a8c19.css("display", "inline-block");
        alert(_0x571282.attr('data-error-importing'));
      });
    }
  }
  function _0x45dfe7() {
    var _0x443456 = [{
      'name': 'action',
      'value': "mvp_import_playlist_db"
    }, {
      'name': "playlist",
      'value': JSON.stringify(_0x292da4.playlist.data)
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    if (_0x292da4.media) {
      _0x443456.push({
        'name': "media",
        'value': JSON.stringify(_0x292da4.media.data)
      });
    }
    if (_0x292da4.path) {
      _0x443456.push({
        'name': "path",
        'value': JSON.stringify(_0x292da4.path.data)
      });
    }
    if (_0x292da4.subtitle) {
      _0x443456.push({
        'name': "subtitle",
        'value': JSON.stringify(_0x292da4.subtitle.data)
      });
    }
    if (_0x292da4.ad) {
      _0x443456.push({
        'name': 'ad',
        'value': JSON.stringify(_0x292da4.ad.data)
      });
    }
    if (_0x292da4.annotation) {
      _0x443456.push({
        'name': "annotation",
        'value': JSON.stringify(_0x292da4.annotation.data)
      });
    }
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x443456,
      'dataType': "json"
    }).done(function (_0x648dd2) {
      window.location = _0x5e722b.attr("data-admin-url") + '?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=' + _0x648dd2;
    }).fail(function (_0x4f25f0, _0x5ce5ee, _0x3dfe3f) {
      console.log(_0x4f25f0.responseText, _0x5ce5ee, _0x3dfe3f);
      _0x1294db.hide();
      _0x9a8c19.css("display", 'inline-block');
      alert(_0x571282.attr("data-error-importing"));
    });
  }
  _0x4a3a32('.mvp-duplicate-playlist').on('click', function () {
    return _0x3dc145(_0x571282.attr('data-enter-playlist-title'), _0x4a3a32(this));
  });
  function _0x3dc145(_0x4cba51, _0x140c47) {
    var _0x45ae18 = prompt(_0x4cba51);
    if (_0x45ae18 == null) {
      return false;
    } else {
      if (_0x45ae18.replace(/^\s+|\s+$/g, '').length == 0x0) {
        _0x3dc145(_0x4cba51, _0x140c47);
        return false;
      } else {
        _0x1294db.show();
        var _0x56e43c = [{
          'name': "action",
          'value': 'mvp_duplicate_playlist'
        }, {
          'name': "security",
          'value': mvp_data.security
        }, {
          'name': "title",
          'value': _0x45ae18
        }, {
          'name': 'playlist_id',
          'value': _0x140c47.closest('.mvp-playlist-row').attr("data-playlist-id")
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': 'post',
          'data': _0x56e43c,
          'dataType': "json"
        }).done(function (_0x49ed26) {
          window.location = _0x5e722b.attr('data-admin-url') + "?page=mvp_playlist_manager&action=edit_playlist&mvp_msg=playlist_created&playlist_id=" + _0x49ed26;
        }).fail(function (_0x41bf1d, _0x19f945, _0x2be9a3) {
          console.log(_0x41bf1d.responseText, _0x19f945, _0x2be9a3);
        });
        return false;
      }
    }
  }
  var _0xcb20fa;
  _0x4a3a32(".mvp-clear-watched-percentage").on("click", function () {
    var _0x49ba34 = confirm("Are you sure you want to clear?");
    if (_0x49ba34) {
      if (_0xcb20fa) {
        return false;
      }
      _0xcb20fa = true;
      _0x1294db.show();
      var _0x181dd5 = [{
        'name': "action",
        'value': "mvp_clear_watched_percentage"
      }, {
        'name': 'playlist_id',
        'value': _0x18c399.attr("data-playlist-id")
      }, {
        'name': 'security',
        'value': mvp_data.security
      }];
      _0x4a3a32.ajax({
        'url': mvp_data.ajax_url,
        'type': "post",
        'data': _0x181dd5,
        'dataType': "json"
      }).done(function (_0x55cfa3) {
        _0x1294db.hide();
        _0xcb20fa = false;
      }).fail(function (_0x2af474, _0x22d1e2, _0x211b1e) {
        console.log(_0x2af474.responseText, _0x22d1e2, _0x211b1e);
        _0x1294db.hide();
        _0xcb20fa = false;
      });
    }
  });
  var _0x31c77f = function (_0x3e76ea) {
    var _0x11fa41 = this;
    var _0x1ac475;
    if (_0x4a3a32("#mvp-tab-media-adverts-content").length) {
      _0x1ac475 = _0x4a3a32("#mvp-tab-media-adverts-content");
    } else {
      if (_0x4a3a32("#mvp-tab-ad-adverts-content").length) {
        _0x1ac475 = _0x4a3a32("#mvp-tab-ad-adverts-content");
      } else if (_0x4a3a32("#mvp-tab-shortcode-adverts-content").length) {
        _0x1ac475 = _0x4a3a32("#mvp-tab-shortcode-adverts-content");
      }
    }
    if (_0x1ac475) {
      _0x1ac475.on('click', '.ad-source-remove', function () {
        var _0x6c54e4 = confirm("Are you sure to delete?");
        if (_0x6c54e4) {
          var _0x52234a = _0x4a3a32(this).closest(".mvp-ad-source");
          _0x52234a.remove();
        }
      });
      _0x1ac475.on("click", ".ad-section-content-btn", function () {
        var _0x517aae = _0x4a3a32(this);
        if (_0x517aae.hasClass("ad-section-pre-btn")) {
          _0x4a3a32("#ad-section-pre-content").toggle();
          _0x4a3a32("#ad-section-timeline").find(".ad-section-timeline-point-pre").toggle();
        } else {
          if (_0x517aae.hasClass("ad-section-mid-btn")) {
            _0x4a3a32("#ad-section-mid-content").toggle();
            _0x4a3a32("#ad-section-timeline").find(".ad-section-timeline-point-mid").toggle();
          } else if (_0x517aae.hasClass("ad-section-end-btn")) {
            _0x4a3a32('#ad-section-end-content').toggle();
            _0x4a3a32("#ad-section-timeline").find(".ad-section-timeline-point-end").toggle();
          }
        }
        if (_0x517aae.hasClass("ad-section-btn-hidden")) {
          _0x517aae.removeClass("ad-section-btn-hidden");
        } else {
          _0x517aae.addClass("ad-section-btn-hidden");
        }
      });
      var _0x1eed3a = _0x1ac475.find(".mvp-preroll-content").sortable({
        'handle': ".option-toggle",
        'update': function (_0x271226, _0x286b66) {}
      });
      var _0x2a5f01 = _0x1ac475.find(".mvp-midroll-content").sortable({
        'handle': '.option-toggle',
        'update': function (_0x52aa46, _0x5aa857) {}
      });
      var _0x2c58d0 = _0x1ac475.find(".mvp-endroll-content").sortable({
        'handle': ".option-toggle",
        'update': function (_0x4c0388, _0x5bd69f) {}
      });
      _0x1ac475.on("change", ".ad_type", function () {
        var _0x483788 = _0x4a3a32(this);
        var _0x3ee1db = _0x483788.closest(".mvp-ad-source");
        var _0x423400 = _0x483788.val();
        _0x3ee1db.find('.ad-path').val('');
        _0x3ee1db.find('.ad_path_upload').attr("data-type", _0x423400).hide();
        _0x3ee1db.find('.ad_begin').val('');
        _0x3ee1db.find(".ad_skip_enable").val('');
        _0x3ee1db.find(".mvp_ad_link").val('');
        _0x3ee1db.find(".ad_rel").val('');
        _0x3ee1db.find(".ad_poster_preview").attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
        if (_0x423400 == "video" || _0x423400 == "video_360") {
          _0x3ee1db.find(".ad_video_info").show();
          _0x3ee1db.find(".ad_path_upload").show();
        } else {
          _0x3ee1db.find(".ad_video_info").hide();
        }
        if (_0x423400 == "audio") {
          _0x3ee1db.find(".ad_poster_field").val('').show();
          _0x3ee1db.find(".ad_audio_info").show();
          _0x3ee1db.find(".ad_path_upload").show();
        } else {
          _0x3ee1db.find('.ad_poster_field').hide();
          _0x3ee1db.find('.ad_audio_info').hide();
        }
        if (_0x423400 == "image" || _0x423400 == "image_360") {
          _0x3ee1db.find(".ad_duration_field").val('').show();
          _0x3ee1db.find(".ad_duration").attr("ap-required", true);
          _0x3ee1db.find('.ad_image_info').show();
          _0x3ee1db.find('.ad_path_upload').show();
        } else {
          _0x3ee1db.find('.ad_duration_field').hide();
          _0x3ee1db.find(".ad_duration").attr("ap-required", false);
          _0x3ee1db.find(".ad_image_info").hide();
        }
        if (_0x423400 == 'youtube_single') {
          _0x3ee1db.find(".ad_yt_single_info").show();
        } else {
          _0x3ee1db.find(".ad_yt_single_info").hide();
        }
        if (_0x423400 == "vimeo_single") {
          _0x3ee1db.find(".ad_vim_single_info").show();
        } else {
          _0x3ee1db.find(".ad_vim_single_info").hide();
        }
        if (_0x423400 == "youtube_single" || _0x423400 == "vimeo_single" || _0x423400 == "image" || _0x423400 == "video") {
          _0x3ee1db.find(".ad_is360_field").show();
          if (_0x423400 == "video") {
            _0x3ee1db.find(".ad_vrMode_field").show();
          } else {
            _0x3ee1db.find('.ad_vrMode_field').hide();
          }
        } else {
          _0x3ee1db.find(".ad_is360_field").hide();
          _0x3ee1db.find(".ad_vrMode_field").hide();
        }
        var _0x52da77 = _0x483788.find("option:selected").text();
        if (_0x3ee1db.hasClass("ad-pre")) {
          _0x3ee1db.find(".option-title").html("PREROLL: " + _0x52da77);
        } else {
          if (_0x3ee1db.hasClass('ad-mid')) {
            _0x3ee1db.find(".option-title").html("MIDROLL: " + _0x52da77);
          } else if (_0x3ee1db.hasClass("ad-end")) {
            _0x3ee1db.find('.option-title').html("ENDROLL: " + _0x52da77);
          }
        }
      }).on("click", ".ad_path_upload, .ad_poster_upload", function (_0xd38c9) {
        _0xd38c9.preventDefault();
        var _0x40ae7b = _0x4a3a32(this);
        var _0x4f3899;
        var _0x28b42c;
        var _0x231ba2;
        var _0x9f9f0c;
        if (_0x40ae7b.hasClass("ad_path_upload")) {
          _0x28b42c = _0x40ae7b.parent().find(".ad_path");
        } else {
          _0x28b42c = _0x40ae7b.parent().find('.ad_poster');
        }
        if (_0x4a3a32(_0xd38c9.currentTarget).hasClass("ad_poster_upload")) {
          _0x4f3899 = "image";
          _0x9f9f0c = "audio";
        } else {
          var _0x3b09b6 = _0x4a3a32(_0xd38c9.currentTarget).attr("data-type");
          if (_0x3b09b6 == "video" || _0x3b09b6 == "video_360") {
            _0x4f3899 = "video";
          } else {
            if (_0x3b09b6 == 'audio') {
              _0x4f3899 = 'audio';
            } else if (_0x3b09b6 == "image" || _0x3b09b6 == "image_360") {
              _0x4f3899 = "image";
              _0x9f9f0c = "image";
            }
          }
        }
        _0x231ba2 = wp.media({
          'library': {
            'type': _0x4f3899
          }
        }).on("select", function () {
          var _0xd0c44d = _0x231ba2.state().get("selection").first().toJSON();
          _0x4a3a32(_0x28b42c).val(_0xd0c44d.url);
          if (_0x9f9f0c == "audio") {
            _0x40ae7b.parent().find('.ad_poster_preview').attr("src", _0xd0c44d.url);
          } else if (_0x9f9f0c == "image") {
            _0x40ae7b.parent().find(".ad_path_preview").attr('src', _0xd0c44d.url);
          }
        }).open();
      }).on("keyup", ".ad_begin", function (_0x5de007) {
        var _0x256f25 = _0x4a3a32(this);
        var _0x565a22 = _0x256f25.val();
        var _0x34fd83 = _0x256f25.closest(".mvp-ad-source").find(".ad_type").find("option:selected").text();
        if (_0x565a22 != '') {
          _0x256f25.closest(".mvp-ad-source").find(".option-title").html("MIDROLL: " + _0x34fd83 + " - start " + _0x565a22);
        } else {
          _0x256f25.closest(".mvp-ad-source").find('.option-title').html("MIDROLL: " + _0x34fd83);
        }
      });
    }
    this.setRandomize = function (_0x577fbf) {
      var _0x45603c = _0x577fbf.randomizeAdPre == undefined ? '0' : _0x577fbf.randomizeAdPre;
      var _0x50d709 = _0x577fbf.randomizeAdEnd == undefined ? '0' : _0x577fbf.randomizeAdEnd;
      _0x1ac475.find("#randomizeAdPre").val(_0x45603c);
      _0x1ac475.find("#randomizeAdEnd").val(_0x50d709);
    };
    this.adjustAd = function (_0x3db348) {
      var _0x1f7ab8 = 0x0;
      var _0x3bd067;
      if (_0x3db348 == 'ad_pre') {
        _0x3bd067 = _0x1eed3a;
      } else {
        if (_0x3db348 == 'ad_mid') {
          _0x3bd067 = _0x2a5f01;
        } else if (_0x3db348 == 'ad_end') {
          _0x3bd067 = _0x2c58d0;
        }
      }
      _0x3bd067.find(".mvp-ad-source").each(function () {
        var _0x141471 = _0x4a3a32(this);
        _0x141471.find(".ad_elem").each(function () {
          var _0x490688 = _0x4a3a32(this);
          var _0x28e72c = _0x490688.attr("data-cname");
          var _0x96a788 = _0x3db348 + '[' + _0x1f7ab8 + '][' + _0x28e72c + ']';
          _0x490688.attr("name", _0x96a788);
        });
        _0x1f7ab8++;
      });
    };
    function _0x4f267e(_0x3bf49d, _0x2c821a) {
      _0x3bf49d.find(".ad_type").find("option[value=\"" + _0x2c821a.type + "\"]").attr("selected", "selected").change();
      _0x3bf49d.find(".ad_path").val(_0x2c821a.path);
      if (_0x2c821a.type == "image") {
        _0x3bf49d.find(".ad_path_preview").attr("src", _0x2c821a.path);
      }
      _0x3bf49d.find(".ad_poster").val(_0x2c821a.poster);
      if (_0x2c821a.poster) {
        _0x3bf49d.find(".ad_poster_preview").attr("src", _0x2c821a.poster);
      }
      _0x3bf49d.find('.ad_duration').val(_0x2c821a.duration);
      _0x3bf49d.find(".ad_begin").val(_0x2c821a.begin);
      _0x3bf49d.find(".ad_is360").find("option[value=\"" + _0x2c821a.is360 + "\"]").attr("selected", "selected").change();
      _0x3bf49d.find(".ad_yt_quality").find("option[value=\"" + _0x2c821a.yt_quality + "\"]").attr('selected', "selected").change();
      _0x3bf49d.find(".ad_skip_enable").val(_0x2c821a.skip_enable);
      _0x3bf49d.find(".mvp_ad_link").val(_0x2c821a.link);
      _0x3bf49d.find(".ad_target").find("option[value=\"" + _0x2c821a.target + "\"]").attr("selected", "selected").change();
      _0x3bf49d.find(".ad_rel").val(_0x2c821a.rel);
    }
    function _0x31b4a8(_0x5777ab) {
      var _0x27fc5d = [];
      _0x5777ab.find(".mvp-ad-source").each(function () {
        var _0x1ea6e7 = parseInt(_0x4a3a32(this).attr("data-id"), 0xa);
        _0x27fc5d.push(_0x1ea6e7);
      });
      return _0x27fc5d.length == 0x0 ? 0x0 : (_0x3d2c0e(_0x27fc5d), _0x27fc5d[_0x27fc5d.length - 0x1] + 0x1);
    }
    function _0x3d2c0e(_0x2d95f8) {
      _0x2d95f8.sort(function (_0x3e8edf, _0x309fdf) {
        return _0x3e8edf - _0x309fdf;
      });
    }
    this.addAdSource = function (_0xb1df34, _0x46d747, _0x3f46f9) {
      var _0x36a1c2;
      if (_0xb1df34 == "ad-pre") {
        _0x36a1c2 = _0x1eed3a;
      } else {
        if (_0xb1df34 == 'ad-mid') {
          _0x36a1c2 = _0x2a5f01;
        } else if (_0xb1df34 == 'ad-end') {
          _0x36a1c2 = _0x2c58d0;
        }
      }
      var _0x52dc2e = _0xb1df34.substr(_0xb1df34.indexOf('-') + 0x1);
      var _0x3b1b27 = _0x31b4a8(_0x36a1c2);
      var _0x5275dd = _0x1ac475.find(".mvp-ad-source-orig").clone().removeClass("mvp-ad-source-orig").addClass("mvp-ad-source").addClass(_0xb1df34).attr({
        'data-id': _0x3b1b27,
        'data-type': _0x52dc2e
      }).show().appendTo(_0x36a1c2);
      if (_0x3f46f9) {
        _0x5275dd.addClass("option-closed");
      }
      _0x5275dd.find('.ad_path').attr("ap-required", true);
      if (_0xb1df34 == "ad-pre") {
        if (typeof _0x46d747 !== "undefined") {
          _0x4f267e(_0x5275dd, _0x46d747);
        } else {
          _0x5275dd.find(".ad_type").change();
        }
        _0x5275dd.find(".ad_begin_field").hide();
      } else {
        if (_0xb1df34 == 'ad-mid') {
          _0x5275dd.find(".ad_begin").attr("ap-required", true);
          if (typeof _0x46d747 !== "undefined") {
            _0x4f267e(_0x5275dd, _0x46d747);
            _0x5275dd.find(".option-title").html("MIDROLL: " + _0x46d747.type + " - start " + _0x46d747.begin);
          } else {
            _0x5275dd.find(".ad_type").change();
          }
        } else if (_0xb1df34 == "ad-end") {
          if (typeof _0x46d747 !== "undefined") {
            _0x4f267e(_0x5275dd, _0x46d747);
          } else {
            _0x5275dd.find(".ad_type").change();
          }
          _0x5275dd.find(".ad_begin_field").hide();
        }
      }
    };
    if (typeof adData_arr !== "undefined") {
      var _0x50ded5;
      var _0x271df9 = adData_arr.length;
      if (_0x271df9 > 0x0) {
        for (_0x50ded5 = 0x0; _0x50ded5 < _0x271df9; _0x50ded5++) {
          _0x11fa41.addAdSource(adData_arr[_0x50ded5].ad_type, adData_arr[_0x50ded5], true);
        }
      }
    } else {
      if (typeof adDataGlobal_arr !== "undefined") {
        var _0x50ded5;
        var _0x271df9 = adDataGlobal_arr.length;
        if (_0x271df9 > 0x0) {
          for (_0x50ded5 = 0x0; _0x50ded5 < _0x271df9; _0x50ded5++) {
            _0x11fa41.addAdSource(adDataGlobal_arr[_0x50ded5].ad_type, adDataGlobal_arr[_0x50ded5], true);
          }
        }
      }
    }
    if (typeof adDataGlobalOptions_arr !== "undefined") {
      _0x11fa41.setRandomize(adDataGlobalOptions_arr);
    }
    var _0x16b9bb;
    var _0x31c85a;
    if (_0x4a3a32('#mvp-tab-media-annotations-content').length) {
      _0x16b9bb = _0x4a3a32('#mvp-tab-media-annotations-content');
    } else if (_0x4a3a32("#mvp-tab-ad-annotations-content").length) {
      _0x16b9bb = _0x4a3a32("#mvp-tab-ad-annotations-content");
    }
    if (_0x16b9bb) {
      _0x16b9bb.on("click", '.annotation-source-remove', function (_0x7cd2a9) {
        var _0x95c7f9 = confirm("Are you sure to delete?");
        if (_0x95c7f9) {
          _0x4a3a32(this).closest(".mvp-annotation-source").remove();
        }
      });
      var _0x1f12ca = _0x16b9bb.find(".mvp-annotation-content").sortable({
        'handle': ".option-toggle-wrap",
        'update': function (_0x1e923e, _0x1c6fcd) {}
      });
      _0x16b9bb.on("change", ".annotation_type", function () {
        var _0x2c04df = _0x4a3a32(this);
        var _0xfb9ae4 = _0x2c04df.closest('.mvp-annotation-source');
        _0x31c85a = _0x2c04df.val();
        _0xfb9ae4.find('.annotation_path_field').hide();
        _0xfb9ae4.find(".annotation_path").val('').prop({
          'required': false
        }).hide();
        _0xfb9ae4.find(".annotation_path_preview").attr("src", "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
        _0xfb9ae4.find(".annotation_path_upload").hide();
        _0xfb9ae4.find(".annotation_path_remove").hide();
        _0xfb9ae4.find(".adsense_client_field").hide();
        _0xfb9ae4.find('.adsense_slot_field').hide();
        _0xfb9ae4.find('.annotation_width_field').hide();
        _0xfb9ae4.find(".annotation_height_field").hide();
        _0xfb9ae4.find(".annotation_adsense_client").val('').attr('ap-required', false);
        _0xfb9ae4.find(".annotation_adsense_slot").val('').attr("ap-required", false);
        _0xfb9ae4.find('.annotation_width').val('').attr("ap-required", false);
        _0xfb9ae4.find(".annotation_height").val('').attr("ap-required", false);
        _0xfb9ae4.find('.annotation_show_time').val('');
        _0xfb9ae4.find(".annotation_end_time").val('');
        _0xfb9ae4.find(".annotation_link").val('');
        _0xfb9ae4.find(".annotation_rel").val('');
        _0xfb9ae4.find('.annotation_adit_class').val('');
        _0xfb9ae4.find(".annotation_css").text('');
        _0xfb9ae4.find(".annotation_image_info").hide();
        _0xfb9ae4.find(".annotation_iframe_info").hide();
        _0xfb9ae4.find(".annotation_html_info").hide();
        _0xfb9ae4.find('.annotation_shortcode_info').hide();
        _0xfb9ae4.find(".annotation_adsense_detail_info").hide();
        _0xfb9ae4.find(".annotation_adsense_code_info").hide();
        if (_0x31c85a == "image") {
          _0xfb9ae4.find(".annotation_path").attr('ap-required', true).show();
          _0xfb9ae4.find(".annotation_path_upload").show();
          _0xfb9ae4.find(".annotation_image_info").show();
          _0xfb9ae4.find(".annotation_path_field").show();
        } else {
          if (_0x31c85a == "iframe") {
            _0xfb9ae4.find(".annotation_path").attr("ap-required", true).show();
            _0xfb9ae4.find(".annotation_iframe_info").show();
            _0xfb9ae4.find(".annotation_path_field").show();
          } else {
            if (_0x31c85a == "html") {
              _0xfb9ae4.find(".annotation_path").attr('ap-required', true).show();
              _0xfb9ae4.find(".annotation_html_info").show();
              _0xfb9ae4.find(".annotation_path_field").show();
            } else {
              if (_0x31c85a == "shortcode") {
                _0xfb9ae4.find(".annotation_path").attr("ap-required", true).show();
                _0xfb9ae4.find('.annotation_shortcode_info').show();
                _0xfb9ae4.find(".annotation_path_field").show();
              } else {
                if (_0x31c85a == "adsense-detail") {
                  _0xfb9ae4.find(".adsense_client_field").show();
                  _0xfb9ae4.find('.adsense_slot_field').show();
                  _0xfb9ae4.find('.annotation_width_field').show();
                  _0xfb9ae4.find(".annotation_height_field").show();
                  _0xfb9ae4.find('.annotation_adsense_client').attr("ap-required", true);
                  _0xfb9ae4.find(".annotation_adsense_slot").attr('ap-required', true);
                  _0xfb9ae4.find(".annotation_adsense_detail_info").show();
                } else if (_0x31c85a == 'adsense-code') {
                  _0xfb9ae4.find(".annotation_path").attr("ap-required", true).show();
                  _0xfb9ae4.find('.annotation_path_field').show();
                  _0xfb9ae4.find('.annotation_adsense_code_info').show();
                }
              }
            }
          }
        }
        _0xfb9ae4.find(".option-title").html("Annotation type: " + _0x31c85a);
      }).on('click', ".annotation_path_upload", function (_0x1567f7) {
        _0x1567f7.preventDefault();
        var _0x391f33 = _0x4a3a32(this).closest(".annotation_path_field");
        var _0x536cf1;
        var _0x2f1797;
        _0x536cf1 = _0x391f33.find('.annotation_path');
        _0x2f1797 = wp.media({
          'library': {
            'type': "image"
          }
        }).on('select', function () {
          var _0x395f60 = _0x2f1797.state().get("selection").first().toJSON();
          _0x4a3a32(_0x536cf1).val(_0x395f60.url);
          _0x391f33.find(".annotation_path_preview").attr("src", _0x395f60.url);
          _0x391f33.find('.annotation_path_remove').show();
        }).open();
      }).on("click", ".annotation_path_remove", function (_0x197d25) {
        _0x197d25.preventDefault();
        var _0x1a88d6 = _0x4a3a32(this).closest(".annotation_path_field");
        _0x1a88d6.find(".annotation_path").val('');
        _0x1a88d6.find(".annotation_path_preview").attr('src', "data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs%3D");
        _0x4a3a32(this).hide();
      }).on("keyup", '.annotation_show_time', function (_0x201c84) {
        var _0x1ad52c = _0x4a3a32(this);
        var _0x29bc0a = _0x1ad52c.val();
        var _0x249ce6 = '0';
        if (_0x29bc0a && _0x29bc0a != '') {
          _0x249ce6 = _0x29bc0a.toString();
        }
        var _0x32885a = _0x1ad52c.closest(".mvp-annotation-source");
        var _0x245a47 = _0x32885a.find('.annotation_type').val();
        var _0x3c9822 = "Annotation type: " + _0x245a47 + ", start: " + _0x249ce6;
        _0x32885a.find(".option-title").html(_0x3c9822);
      });
      _0x16b9bb.find('.annotation-add').on('click', function (_0x1e07d0) {
        _0x31c85a = "image";
        _0x11fa41.addAnnotationSource();
      });
    }
    this.adjustAnnotation = function () {
      var _0x165665 = 0x0;
      _0x1f12ca.find('.mvp-annotation-source').each(function () {
        var _0x477234 = _0x4a3a32(this);
        _0x477234.find(".annotation_elem").each(function () {
          var _0x908ea9 = _0x4a3a32(this);
          var _0x2da08d = _0x908ea9.attr("data-cname");
          var _0x5f3cad = "annotation[" + _0x165665 + '][' + _0x2da08d + ']';
          _0x908ea9.attr("name", _0x5f3cad);
        });
        _0x165665++;
      });
    };
    this.addAnnotationSource = function (_0x328dbf, _0x12d3ac) {
      var _0x1f14f1 = _0x16b9bb.find(".mvp-annotation-source-orig").clone().removeClass("mvp-annotation-source-orig").addClass("mvp-annotation-source").show().appendTo(_0x1f12ca);
      if (_0x12d3ac) {
        _0x1f14f1.addClass("option-closed");
      }
      if (typeof _0x328dbf !== "undefined") {
        _0x1f14f1.find(".annotation_type").find("option[value=\"" + _0x328dbf.type + "\"]").attr("selected", "selected").change();
        _0x1f14f1.find(".annotation_adit_class").val(_0x328dbf.adit_class);
        _0x1f14f1.find(".annotation_show_time").val(_0x328dbf.show_time);
        _0x1f14f1.find(".annotation_end_time").val(_0x328dbf.hide_time);
        _0x1f14f1.find(".annotation_link").val(_0x328dbf.link);
        _0x1f14f1.find(".annotation_target").find("option[value=\"" + _0x328dbf.target + "\"]").attr("selected", "selected").change();
        _0x1f14f1.find(".annotation_rel").val(_0x328dbf.rel);
        _0x1f14f1.find(".annotation_close_btn").find("option[value=\"" + _0x328dbf.close_btn + "\"]").attr("selected", "selected").change();
        _0x1f14f1.find(".annotation_close_btn_position").find("option[value=\"" + _0x328dbf.close_btn_position + "\"]").attr("selected", "selected").change();
        _0x1f14f1.find(".annotation_position").find("option[value=\"" + _0x328dbf.position + "\"]").attr('selected', "selected").change();
        if (_0x328dbf.css) {
          _0x1f14f1.find('.annotation_css').text(_0x328dbf.css);
        }
        if (_0x31c85a == "image" || _0x31c85a == 'iframe') {
          _0x1f14f1.find(".annotation_path").val(_0x328dbf.path);
          if (_0x31c85a == "image") {
            _0x1f14f1.find(".annotation_path_preview").attr('src', _0x328dbf.path);
            _0x1f14f1.find(".annotation_path_remove").show();
          }
        } else {
          if (_0x31c85a == 'html') {
            _0x1f14f1.find('.annotation_path').val(_0x328dbf.path);
          } else {
            if (_0x31c85a == "shortcode") {
              _0x1f14f1.find(".annotation_path").val(_0x328dbf.path);
            } else {
              if (_0x31c85a == "adsense-detail") {
                _0x1f14f1.find(".annotation_adsense_client").val(_0x328dbf.adsense_client);
                _0x1f14f1.find(".annotation_adsense_slot").val(_0x328dbf.adsense_slot);
                _0x1f14f1.find(".annotation_width").val(_0x328dbf.width);
                _0x1f14f1.find(".annotation_height").val(_0x328dbf.height);
              } else if (_0x31c85a == 'adsense-code') {
                _0x1f14f1.find(".annotation_path").val(_0x328dbf.path);
              }
            }
          }
        }
        var _0x58e0db = '0';
        if (_0x328dbf.show_time) {
          _0x58e0db = _0x328dbf.show_time;
        }
        _0x1f14f1.find(".option-title").html("Annotation type: " + _0x328dbf.type + ", start: " + _0x58e0db);
      } else {
        _0x1f14f1.find('.annotation_type').change();
        _0x1f14f1.find(".annotation_path").val('');
      }
    };
    if (typeof annotationData_arr !== 'undefined') {
      var _0x50ded5;
      var _0x271df9 = annotationData_arr.length;
      if (_0x271df9 > 0x0) {
        for (_0x50ded5 = 0x0; _0x50ded5 < _0x271df9; _0x50ded5++) {
          _0x11fa41.addAnnotationSource(annotationData_arr[_0x50ded5], true);
        }
      }
    } else {
      if (typeof annotationDataGlobal_arr !== "undefined") {
        var _0x50ded5;
        var _0x271df9 = annotationDataGlobal_arr.length;
        if (_0x271df9 > 0x0) {
          for (_0x50ded5 = 0x0; _0x50ded5 < _0x271df9; _0x50ded5++) {
            _0x11fa41.addAnnotationSource(annotationDataGlobal_arr[_0x50ded5], true);
          }
        }
      }
    }
  };
  window.MVPAdContent = _0x31c77f;
  _0x4a3a32("#mvp-ads-order").one("click", function () {
    var _0x36669e = _0x4a3a32("#mvp-ads-order-by").val();
    window.location.href = _0x36669e;
  });
  var _0x393784 = new _0x31c77f();
  var _0x5d1ef8 = _0x4a3a32('#mvp-ad-tabs');
  _0x5d1ef8.find(".mvp-tab-header li").click(function () {
    var _0x31be25 = _0x4a3a32(this);
    var _0x304508 = _0x31be25.attr('id');
    if (!_0x31be25.hasClass("mvp-tab-active")) {
      _0x5d1ef8.find(".mvp-tab-header li").removeClass('mvp-tab-active');
      _0x31be25.addClass("mvp-tab-active");
      _0x5d1ef8.find('.mvp-tab-content').hide();
      _0x5d1ef8.find(_0x4a3a32('#' + _0x304508 + "-content")).show();
    }
  });
  _0x5d1ef8.find(".mvp-tab-header li").eq(0x0).addClass('mvp-tab-active');
  _0x5d1ef8.find('.mvp-tab-content').eq(0x0).show();
  var _0xcc78df = _0x4a3a32("#mvp-tab-ad-adverts-content");
  var _0x215ffc = _0x4a3a32("#mvp-tab-ad-annotations-content");
  var _0x1509f2 = _0x4a3a32("#mvp-add-ad-modal");
  var _0x355df0 = _0x4a3a32('.mvp-modal-bg').on('click', function (_0x50e319) {
    if (_0x50e319.target == this) {
      _0x1ea86d();
    }
  });
  _0x349436.on('keyup', function (_0x2b65b5) {
    _0x2b65b5.stopImmediatePropagation();
    _0x2b65b5.preventDefault();
    var _0x1e2221 = _0x2b65b5.keyCode;
    if (_0x1e2221 == 0x1b) {
      _0x1ea86d();
    }
  });
  _0x4a3a32('#mvp-add-ad-cancel').on("click", function (_0x40bac9) {
    _0x1ea86d();
  });
  var _0x5a389b;
  _0x4a3a32("#mvp-add-ad-submit").on('click', function (_0x448f3c) {
    var _0x47fc63 = _0x4a3a32("#ad-title");
    if (_0x47fc63.val().replace(/^\s+|\s+$/g, '').length == 0x0) {
      _0x47fc63.addClass("aprf");
      _0x355df0.scrollTop(0x0);
      alert(_0x571282.attr("data-title-required"));
      return false;
    }
    if (_0x5a389b) {
      return false;
    }
    _0x5a389b = true;
    var _0x43e1fc = _0x47fc63.val();
    _0x1294db.show();
    _0x1ea86d();
    var _0x8e350c = [{
      'name': "action",
      'value': "mvp_create_ad"
    }, {
      'name': 'security',
      'value': mvp_data.security
    }, {
      'name': "title",
      'value': _0x43e1fc
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': 'post',
      'data': _0x8e350c,
      'dataType': "json"
    }).done(function (_0x1906bd) {
      window.location = _0xc04156.attr('data-admin-url') + "?page=mvp_ad_manager&action=edit_ad&mvp_msg=ad_created&ad_id=" + _0x1906bd;
    }).fail(function (_0xaf2329, _0x2625fc, _0xc10a41) {
      console.log(_0xaf2329.responseText, _0x2625fc, _0xc10a41);
      _0x5a389b = false;
      _0x1ea86d();
    });
    return false;
  });
  function _0x1ea86d() {
    _0x1509f2.hide();
    _0x1509f2.find('#ad-title').val('').removeClass("aprf");
  }
  _0x4a3a32("#mvp-add-ad").on('click', function (_0x63659e) {
    _0x38557a();
  });
  function _0x38557a() {
    _0x1509f2.show();
    _0x4a3a32('#ad-title').focus();
    _0x355df0.scrollTop(0x0);
  }
  var _0x301478 = _0x4a3a32("#mvp-edit-ad-form");
  var _0x3ae750;
  _0x4a3a32("#mvp-edit-ad-form-submit").on("click", function () {
    if (_0x3ae750) {
      return false;
    }
    _0x3ae750 = true;
    _0x4a3a32("#type").prop("disabled", false);
    var _0x5ebdf2;
    var _0x15d561;
    var _0x25a5de;
    _0x5d1ef8.find(".mvp-tab-content").each(function () {
      _0x15d561 = _0x4a3a32(this);
      _0x15d561.find("input[ap-required=true]").each(function () {
        var _0x48826e = _0x4a3a32(this);
        if (_0x48826e.val() == '') {
          if (!_0x25a5de) {
            _0x25a5de = _0x48826e;
          }
          _0x48826e.addClass('aprf');
          if (!_0x5ebdf2) {
            _0x5ebdf2 = _0x15d561.attr('id');
            _0x5ebdf2 = _0x5ebdf2.substr(0x0, _0x5ebdf2.length - 0x8);
          }
          if (_0x5ebdf2 == "mvp-tab-ad-adverts") {
            _0x48826e.closest(".option-tab.mvp-ad-source").removeClass("option-closed");
          }
          if (_0x5ebdf2 == "mvp-tab-ad-annotations") {
            _0x48826e.closest(".option-tab.mvp-annotation-source").removeClass('option-closed');
          }
        } else {
          _0x48826e.removeClass("aprf");
        }
      });
    });
    if (_0x5ebdf2) {
      _0x4a3a32('#' + _0x5ebdf2).click();
      _0x3ae750 = false;
      _0x25a5de[0x0].scrollIntoView({
        'behavior': "smooth",
        'block': "center"
      });
      _0x25a5de = null;
      alert(_0x571282.attr("data-fill-required-fields"));
      return false;
    }
    _0x1294db.show();
    var _0x4b4b49 = [];
    _0xcc78df.find(".mvp-ad-source.ad-pre").each(function () {
      var _0x11d448 = _0x4a3a32(this);
      _0x4b4b49.push(_0x301dab(_0x11d448, "ad-pre"));
    });
    var _0x58660d = _0x4b4b49;
    _0x4b4b49 = [];
    _0xcc78df.find(".mvp-ad-source.ad-mid").each(function () {
      var _0x37b944 = _0x4a3a32(this);
      _0x4b4b49.push(_0x301dab(_0x37b944, 'ad-mid'));
    });
    var _0x385269 = _0x4b4b49;
    _0x4b4b49 = [];
    _0xcc78df.find(".mvp-ad-source.ad-end").each(function () {
      var _0x3e6a6f = _0x4a3a32(this);
      _0x4b4b49.push(_0x301dab(_0x3e6a6f, 'ad-end'));
    });
    var _0x34b362 = _0x4b4b49;
    var _0x4b4b49 = [];
    _0x215ffc.find(".mvp-annotation-source").each(function () {
      var _0x26dafc = _0x4a3a32(this);
      var _0x6f2e2 = {
        type: _0x48cd6d
      };
      var _0x48cd6d = _0x26dafc.find(".annotation_type").val();
      if (_0x48cd6d == 'adsense-detail') {
        var _0x1f3680 = _0x26dafc.find('.annotation_adsense_client').val().replace(/"/g, "'");
        var _0x1f89e8 = _0x26dafc.find('.annotation_adsense_slot').val().replace(/"/g, "'");
        var _0x410196 = _0x26dafc.find(".annotation_width").val().replace(/"/g, "'");
        var _0x42ba7e = _0x26dafc.find('.annotation_height').val().replace(/"/g, "'");
        if (_0x1f3680) {
          _0x6f2e2.adsense_client = _0x1f3680;
        }
        if (_0x1f89e8) {
          _0x6f2e2.adsense_slot = _0x1f89e8;
        }
        if (_0x410196) {
          _0x6f2e2.width = _0x410196;
        }
        if (_0x42ba7e) {
          _0x6f2e2.height = _0x42ba7e;
        }
      } else {
        _0x6f2e2.path = _0x26dafc.find(".annotation_path").val().replace(/"/g, "'");
      }
      var _0x3830d8 = _0x26dafc.find(".annotation_show_time").val();
      if (!(_0x3830d8.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x6f2e2.show_time = _0x3830d8;
      }
      var _0x4d3dce = _0x26dafc.find('.annotation_end_time').val();
      if (!(_0x4d3dce.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x6f2e2.hide_time = _0x4d3dce;
      }
      var _0xb93d7e = _0x26dafc.find(".annotation_link").val();
      if (!(_0xb93d7e.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x6f2e2.link = _0xb93d7e;
        _0x6f2e2.target = _0x26dafc.find('.annotation_target').val();
        var _0x487f4c = _0x26dafc.find(".annotation_rel").val();
        if (!(_0x487f4c.replace(/^\s+|\s+$/g, '').length == 0x0)) {
          _0x6f2e2.rel = _0x487f4c;
        }
      }
      _0x6f2e2.close_btn = _0x26dafc.find(".annotation_close_btn").val();
      _0x6f2e2.close_btn_position = _0x26dafc.find('.annotation_close_btn_position').val();
      _0x6f2e2.position = _0x26dafc.find(".annotation_position").val();
      var _0x4cdd50 = _0x26dafc.find('.annotation_adit_class').val().replace(/"/g, "'");
      if (!(_0x4cdd50.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x6f2e2.adit_class = _0x4cdd50;
      }
      var _0x3523c2 = _0x26dafc.find(".annotation_css").val().replace(/"/g, "'");
      if (!(_0x3523c2.replace(/^\s+|\s+$/g, '').length == 0x0)) {
        _0x6f2e2.css = _0x3523c2;
      }
      _0x4b4b49.push(_0x6f2e2);
    });
    var _0x2e9e38 = _0x4b4b49;
    var _0x361a77 = {
      "randomizeAdPre": _0x4a3a32("#randomizeAdPre").val(),
      "randomizeAdEnd": _0x4a3a32("#randomizeAdEnd").val()
    };
    console.log(_0x361a77);
    var _0x386511 = [{
      'name': "action",
      'value': "mvp_save_ad_options"
    }, {
      'name': "ad_id",
      'value': _0x301478.attr("data-ad-id")
    }, {
      'name': "global_ad_options",
      'value': JSON.stringify(_0x361a77)
    }, {
      'name': "ad_pre",
      'value': _0x58660d.length ? JSON.stringify(_0x58660d) : ''
    }, {
      'name': "ad_mid",
      'value': _0x385269.length ? JSON.stringify(_0x385269) : ''
    }, {
      'name': "ad_end",
      'value': _0x34b362.length ? JSON.stringify(_0x34b362) : ''
    }, {
      'name': "annotation",
      'value': _0x2e9e38.length ? JSON.stringify(_0x2e9e38) : ''
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x386511,
      'dataType': "json"
    }).done(function (_0x44437c) {
      _0x1294db.hide();
      _0x3ae750 = false;
    }).fail(function (_0x40a1c3, _0xf96eeb, _0x3f63ae) {
      console.log(_0x40a1c3.responseText, _0xf96eeb, _0x3f63ae);
      _0x1294db.hide();
      _0x3ae750 = false;
    });
  });
  function _0x301dab(_0x4df9c2, _0x43b86d) {
    var _0x189ee8 = {
      "ad_type": _0x43b86d,
      "type": _0x4df9c2.find('.ad_type').val(),
      "path": _0x4df9c2.find('.ad_path').val().replace(/"/g, "'"),
      "is360": _0x4df9c2.find(".ad_is360").val()
    };
    var _0x217471 = _0x4df9c2.find(".ad_duration").val();
    if (!(_0x217471.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x189ee8.duration = _0x217471;
    }
    var _0x3d546f = _0x4df9c2.find('.ad_begin').val();
    if (!(_0x3d546f.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x189ee8.begin = _0x3d546f;
    }
    var _0x578bdb = _0x4df9c2.find(".ad_poster").val().replace(/"/g, "'");
    if (!(_0x578bdb.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x189ee8.poster = _0x578bdb;
    }
    var _0x46beed = _0x4df9c2.find(".ad_skip_enable").val();
    if (!(_0x46beed.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x189ee8.skip_enable = _0x46beed;
    }
    var _0x593904 = _0x4df9c2.find('.mvp_ad_link').val();
    if (!(_0x593904.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      _0x189ee8.link = _0x593904;
      _0x189ee8.target = _0x4df9c2.find(".ad_target").val();
      if (_0x4df9c2.find('.ad_rel').val()) {
        _0x189ee8.rel = _0x4df9c2.find(".ad_rel").val();
      }
    }
    return _0x189ee8;
  }
  var _0xc04156 = _0x4a3a32("#mvp-ad-item-list");
  _0x4a3a32("#mvp-filter-ad").on("keyup.apfilter", function () {
    var _0x3d8b1c = _0x4a3a32(this).val();
    var _0x144349;
    var _0x23a61e = 0x0;
    var _0x1d7a78;
    var _0x218432 = _0xc04156.children(".mvp-ad-item").length;
    for (_0x144349 = 0x0; _0x144349 < _0x218432; _0x144349++) {
      _0x1d7a78 = _0xc04156.children(".mvp-ad-item").eq(_0x144349).find('.mvp-ad-title').val();
      if (_0x1d7a78.indexOf(_0x3d8b1c) > -0x1) {
        _0xc04156.children(".mvp-ad-item").eq(_0x144349).show();
      } else {
        _0xc04156.children('.mvp-ad-item').eq(_0x144349).hide();
        _0x23a61e++;
      }
    }
  });
  _0x4a3a32(".mvp-ad-table").on("click", '.mvp-ad-all', function () {
    if (_0x4a3a32(this).is(':checked')) {
      _0xc04156.find(".mvp-ad-indiv").prop('checked', true);
    } else {
      _0xc04156.find('.mvp-ad-indiv').prop("checked", false);
    }
  });
  _0x4a3a32('#mvp-delete-ads').on("click", function () {
    if (_0xc04156.find('.mvp-ad-indiv').length == 0x0) {
      return false;
    }
    var _0x58ad99 = _0xc04156.find(".mvp-ad-indiv:checked");
    if (_0x58ad99.length == 0x0) {
      alert(_0x571282.attr("data-no-ads-selected"));
      return false;
    }
    var _0x15d248 = confirm(_0x571282.attr("data-sure-to-delete"));
    if (_0x15d248) {
      _0x1294db.show();
      var _0x576e83 = [];
      _0x58ad99.each(function () {
        _0x576e83.push(parseInt(_0x4a3a32(this).closest(".mvp-ad-row").attr('data-ad-id'), 0xa));
      });
      _0x25837d(_0x576e83);
    }
  });
  function _0x25837d(_0x298077) {
    var _0x393649 = [{
      'name': "action",
      'value': "mvp_delete_ad"
    }, {
      'name': 'ad_id',
      'value': _0x298077
    }, {
      'name': 'security',
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x393649,
      'dataType': 'json'
    }).done(function (_0x2d6990) {
      _0x1294db.hide();
      if (_0x2d6990 > 0x0) {
        var _0xe46b7f;
        var _0xa919e6 = _0x298077.length;
        for (_0xe46b7f = 0x0; _0xe46b7f < _0xa919e6; _0xe46b7f++) {
          _0xc04156.find(".mvp-ad-row[data-ad-id=\"" + _0x298077[_0xe46b7f] + "\"]").remove();
        }
        _0x4a3a32('.mvp-ad-all').prop("checked", false);
      }
    }).fail(function (_0x20a608, _0x37b819, _0x1391ae) {
      console.log(_0x20a608.responseText, _0x37b819, _0x1391ae);
      _0x1294db.hide();
    });
  }
  _0xc04156.on("click", ".mvp-delete-ad", function () {
    var _0x5a9a70 = confirm(_0x571282.attr('data-sure-to-delete'));
    if (_0x5a9a70) {
      var _0x4e8304 = parseInt(_0x4a3a32(this).closest(".mvp-ad-row").attr("data-ad-id"), 0xa);
      _0x1294db.show();
      _0x25837d([_0x4e8304]);
    }
    return false;
  });
  _0x4a3a32("#mvp-ad-domain-rename").on('click', function (_0x3352df) {
    var _0x5ad599 = _0x4a3a32('#mvp-ad-domain-rename-from').val();
    var _0x3f3392 = _0x4a3a32('#mvp-ad-domain-rename-to').val();
    if (!(_0x5ad599.replace(/^\s+|\s+$/g, '').length == 0x0) && !(_0x3f3392.replace(/^\s+|\s+$/g, '').length == 0x0)) {
      var _0x24612f = confirm(_0x571282.attr("data-sure-to-rename"));
      if (_0x24612f) {
        _0x1294db.show();
        var _0x477664 = _0x301478.attr('data-ad-id');
        var _0x5ed5cc = [{
          'name': "action",
          'value': "mvp_ad_domain_rename"
        }, {
          'name': "ad_id",
          'value': _0x477664
        }, {
          'name': "from",
          'value': _0x5ad599
        }, {
          'name': 'to',
          'value': _0x3f3392
        }, {
          'name': "security",
          'value': mvp_data.security
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': "post",
          'data': _0x5ed5cc,
          'dataType': "json"
        }).done(function (_0x15be65) {
          var _0x4b5e55;
          var _0x541a1a;
          _0xcc78df.find('.mvp-ad-source').each(function () {
            _0x4b5e55 = _0x4a3a32(this);
            _0x541a1a = _0x4b5e55.find(".ad_path").val();
            _0x541a1a = _0x541a1a.replace(_0x5ad599, _0x3f3392);
            _0x4b5e55.find(".ad_path").val(_0x541a1a);
            _0x541a1a = _0x4b5e55.find(".ad_poster").val();
            _0x541a1a = _0x541a1a.replace(_0x5ad599, _0x3f3392);
            _0x4b5e55.find(".ad_poster").val(_0x541a1a);
          });
          _0x215ffc.find('.mvp-annotation-source').each(function () {
            _0x4b5e55 = _0x4a3a32(this);
            _0x541a1a = _0x4b5e55.find(".annotation_path").val();
            _0x541a1a = _0x541a1a.replace(_0x5ad599, _0x3f3392);
            _0x4b5e55.find(".annotation_path").val(_0x541a1a);
          });
          _0x1294db.hide();
        }).fail(function (_0x27397d, _0x318ea2, _0x1832b8) {
          console.log(_0x27397d.responseText, _0x318ea2, _0x1832b8);
          _0x1294db.hide();
        });
      }
    }
  });
  _0x4a3a32('.mvp-table').on('click', ".mvp-export-ad-btn", function () {
    _0x1294db.show();
    var _0x1432b7 = _0x4a3a32(this).closest(".mvp-ad-row").attr("data-ad-id");
    var _0x4b81bd = _0x4a3a32(this).closest(".mvp-ad-row").find('.title-editable').val();
    _0x4b81bd = _0x4b81bd.replace(/\W/g, '');
    var _0x5e59f8 = [{
      'name': 'action',
      'value': "mvp_export_ad"
    }, {
      'name': 'ad_id',
      'value': _0x1432b7
    }, {
      'name': 'ad_title',
      'value': _0x4b81bd
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x5e59f8,
      'dataType': "json"
    }).done(function (_0x1ec208) {
      _0x1294db.hide();
      if (_0x1ec208.zip) {
        location.href = _0x1ec208.zip;
        var _0x391f91 = [{
          'name': "action",
          'value': 'mvp_clean_export'
        }, {
          'name': "zipname",
          'value': _0x1ec208.zip_clean
        }, {
          'name': "security",
          'value': mvp_data.security
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': "post",
          'data': _0x391f91
        });
      }
    }).fail(function (_0x1a8f12, _0x5efdfc, _0x5ebf9d) {
      console.log(_0x1a8f12.responseText, _0x5efdfc, _0x5ebf9d);
      _0x1294db.hide();
    });
    return false;
  });
  var _0x13e6e8 = _0x4a3a32("#mvp-ad-file-input").on('change', _0x4b5231);
  var _0x4c2410 = _0x4a3a32('#mvp-import-ad').click(function () {
    _0x13e6e8.trigger("click");
    return false;
  });
  var _0x21f34e;
  function _0x4b5231(_0x50ced1) {
    if (_0x50ced1.target.files.length == 0x0) {
      return;
    }
    var _0x3338ce = _0x50ced1.target.files[0x0].name;
    if (_0x3338ce.indexOf("mvp_ad_id_") == -0x1) {
      alert(_0x571282.attr('data-upload-previously-exported-ad-zip'));
      return;
    }
    _0x1294db.show();
    _0x4c2410.css('display', 'none');
    var _0x546931 = _0x50ced1.target.files;
    var _0x188b26 = new FormData();
    _0x4a3a32.each(_0x546931, function (_0x2584cc, _0x2f5579) {
      _0x188b26.append("mvp_file_upload", _0x2f5579);
    });
    _0x188b26.append("action", "mvp_import_ad");
    _0x188b26.append("security", mvp_data.security);
    _0x13e6e8.val('');
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x188b26,
      'dataType': "json",
      'processData': false,
      'contentType': false
    }).done(function (_0x2a8812) {
      if (_0x2a8812.global_ad) {
        _0x21f34e = {};
        _0x21f34e.global_ad = {
          'data': null,
          'url': _0x2a8812.global_ad
        };
        if (_0x2a8812.ad) {
          _0x21f34e.ad = {
            'data': null,
            'url': _0x2a8812.ad
          };
        }
        if (_0x2a8812.annotation) {
          _0x21f34e.annotation = {
            'data': null,
            'url': _0x2a8812.annotation
          };
        }
        _0x1302dc(_0x21f34e.global_ad.url);
      } else {
        _0x4c2410.css("display", "inline-block");
        _0x1294db.hide();
        alert(_0x571282.attr("data-error-importing"));
      }
    }).fail(function (_0x164abf, _0x226fa2, _0x512eed) {
      console.log(_0x164abf.responseText, _0x226fa2, _0x512eed);
      _0x4c2410.css('display', "inline-block");
      _0x1294db.hide();
      alert(_0x571282.attr('data-error-importing'));
    });
  }
  function _0x1302dc(_0x4a9761) {
    if (typeof _0x4a3a32.csv === "undefined") {
      var _0x2ce0c4 = document.createElement("script");
      _0x2ce0c4.type = "text/javascript";
      _0x2ce0c4.src = "https://cdnjs.cloudflare.com/ajax/libs/jquery-csv/1.0.5/jquery.csv.min.js";
      _0x2ce0c4.onload = _0x2ce0c4.onreadystatechange = function () {
        if (!this.readyState || this.readyState == "complete") {
          _0x1302dc(_0x4a9761);
        }
      };
      _0x2ce0c4.onerror = function () {
        console.log("Error loading " + this.src);
      };
      var _0x4571f4 = document.getElementsByTagName("script")[0x0];
      _0x4571f4.parentNode.insertBefore(_0x2ce0c4, _0x4571f4);
    } else {
      _0x4a3a32.ajax({
        'type': 'GET',
        'url': _0x4a9761,
        'dataType': "text"
      }).done(function (_0x7d8b74) {
        if (_0x21f34e.global_ad.data == null) {
          var _0x5ba881 = _0x4a3a32.csv.toArray(_0x7d8b74, {
            'separator': '|',
            'delimiter': '^'
          }, function (_0x48a3eb, _0x43da80) {
            _0x21f34e.global_ad.data = _0x43da80;
            if (_0x21f34e.ad) {
              _0x1302dc(_0x21f34e.ad.url);
            } else {
              if (_0x21f34e.annotation) {
                _0x1302dc(_0x21f34e.annotation.url);
              } else {
                _0x3abed5();
              }
            }
          });
        } else {
          if (_0x21f34e.ad.data == null) {
            var _0x5ba881 = _0x4a3a32.csv.toArrays(_0x7d8b74, {
              'separator': '|',
              'delimiter': '^'
            }, function (_0x1bc921, _0x5dd1a3) {
              _0x21f34e.ad.data = _0x5dd1a3;
              if (_0x21f34e.annotation) {
                _0x1302dc(_0x21f34e.annotation.url);
              } else {
                _0x3abed5();
              }
            });
          } else {
            if (_0x21f34e.annotation.data == null) {
              var _0x5ba881 = _0x4a3a32.csv.toArrays(_0x7d8b74, {
                'separator': '|',
                'delimiter': '^'
              }, function (_0x444771, _0x5d862f) {
                _0x21f34e.annotation.data = _0x5d862f;
                _0x3abed5();
              });
            }
          }
        }
      }).fail(function (_0x1ae9a0, _0x590d52, _0x3abd00) {
        console.log("Error process CSV: " + _0x1ae9a0, _0x590d52, _0x3abd00);
        _0x1294db.hide();
        _0x4c2410.css("display", "inline-block");
        alert(_0x571282.attr("data-error-importing"));
      });
    }
  }
  function _0x3abed5() {
    var _0x5ec4e3 = [{
      'name': "action",
      'value': 'mvp_import_ad_db'
    }, {
      'name': "global_ad",
      'value': JSON.stringify(_0x21f34e.global_ad.data)
    }, {
      'name': "security",
      'value': mvp_data.security
    }];
    if (_0x21f34e.ad) {
      _0x5ec4e3.push({
        'name': 'ad',
        'value': JSON.stringify(_0x21f34e.ad.data)
      });
    }
    if (_0x21f34e.annotation) {
      _0x5ec4e3.push({
        'name': 'annotation',
        'value': JSON.stringify(_0x21f34e.annotation.data)
      });
    }
    _0x4a3a32.ajax({
      'url': mvp_data.ajax_url,
      'type': "post",
      'data': _0x5ec4e3,
      'dataType': "json"
    }).done(function (_0x2903cb) {
      window.location = _0xc04156.attr("data-admin-url") + "?page=mvp_ad_manager&action=edit_ad&mvp_msg=ad_created&ad_id=" + _0x2903cb;
    }).fail(function (_0x2f6e5a, _0xdb67df, _0x555009) {
      console.log(_0x2f6e5a.responseText, _0xdb67df, _0x555009);
      _0x1294db.hide();
      _0x9a8c19.css("display", "inline-block");
      alert(_0x571282.attr("data-error-importing"));
    });
  }
  _0x4a3a32(".mvp-duplicate-ad").on("click", function () {
    return _0x2dda8f("Enter title for new ad:", _0x4a3a32(this));
  });
  function _0x2dda8f(_0x13d59e, _0x4145b2) {
    var _0x3f513f = prompt(_0x13d59e);
    if (_0x3f513f == null) {
      return false;
    } else {
      if (_0x3f513f.replace(/^\s+|\s+$/g, '').length == 0x0) {
        _0x2dda8f(_0x13d59e, _0x4145b2);
        return false;
      } else {
        _0x1294db.show();
        var _0x4342bf = [{
          'name': 'action',
          'value': "mvp_duplicate_ad"
        }, {
          'name': 'security',
          'value': mvp_data.security
        }, {
          'name': "title",
          'value': _0x3f513f
        }, {
          'name': "ad_id",
          'value': _0x4145b2.closest(".mvp-ad-row").attr("data-ad-id")
        }];
        _0x4a3a32.ajax({
          'url': mvp_data.ajax_url,
          'type': "post",
          'data': _0x4342bf,
          'dataType': 'json'
        }).done(function (_0x1f1fc2) {
          window.location = _0xc04156.attr('data-admin-url') + "?page=mvp_ad_manager&action=edit_ad&mvp_msg=ad_created&ad_id=" + _0x1f1fc2;
        }).fail(function (_0x471a64, _0x118d42, _0x3d35f1) {
          console.log(_0x471a64.responseText, _0x118d42, _0x3d35f1);
        });
      }
    }
  }
  function _0xe2ade8(_0x468a33, _0x13d1f9) {
    return _0x468a33 - _0x13d1f9;
  }
  function _0x3632e8(_0x237713) {
    var _0x1a7623 = _0x237713.split(':');
    var _0x5bb6f9 = 0x0;
    var _0x22ac26 = 0x1;
    while (_0x1a7623.length > 0x0) {
      _0x5bb6f9 += _0x22ac26 * parseInt(_0x1a7623.pop(), 0xa);
      _0x22ac26 *= 0x3c;
    }
    return _0x5bb6f9;
  }
  function _0x406bc8(_0x5b5ab2, _0x5c6538, _0x213b13) {
    var _0x4b9cb0 = 0x1;
    if (_0x213b13) {
      _0x4b9cb0 = -0x1;
    }
    return _0x5b5ab2.sort(function (_0x27d612, _0x57986a) {
      var _0x5f27d = _0x27d612.find(_0x5c6538).html();
      var _0x410acf = _0x57986a.find(_0x5c6538).html();
      return _0x4b9cb0 * (_0x5f27d < _0x410acf ? -0x1 : _0x5f27d > _0x410acf ? 0x1 : 0x0);
    });
  }
  function _0x153b05(_0x366c86, _0x5cef5d, _0x1343f7) {
    var _0x565b27 = 0x1;
    if (_0x1343f7) {
      _0x565b27 = -0x1;
    }
    return _0x366c86.sort(function (_0x493be5, _0x278642) {
      var _0x3e57e7 = parseInt(_0x493be5.find(_0x5cef5d).html(), 0xa);
      var _0x4be649 = parseInt(_0x278642.find(_0x5cef5d).html(), 0xa);
      return _0x565b27 * (_0x3e57e7 < _0x4be649 ? -0x1 : _0x3e57e7 > _0x4be649 ? 0x1 : 0x0);
    });
  }
  var _0x1125b9 = {
    0x0: "That key has no keycode",
    0x3: "break",
    0x8: "backspace / delete",
    0x9: "tab",
    0xc: "clear",
    0xd: "enter",
    0x10: 'shift',
    0x11: "ctrl",
    0x12: "alt",
    0x13: 'pause/break',
    0x14: "caps lock",
    0x15: "hangul",
    0x19: "hanja",
    0x1b: "escape",
    0x1c: "conversion",
    0x1d: "non-conversion",
    0x20: "spacebar",
    0x21: "page up",
    0x22: "page down",
    0x23: "end",
    0x24: "home",
    0x25: "left arrow",
    0x26: "up arrow",
    0x27: "right arrow",
    0x28: "down arrow",
    0x29: "select",
    0x2a: "print",
    0x2b: "execute",
    0x2c: "Print Screen",
    0x2d: "insert",
    0x2e: "delete",
    0x2f: "help",
    0x30: '0',
    0x31: '1',
    0x32: '2',
    0x33: '3',
    0x34: '4',
    0x35: '5',
    0x36: '6',
    0x37: '7',
    0x38: '8',
    0x39: '9',
    0x3a: ':',
    0x3b: "semicolon (firefox), equals",
    0x3c: '<',
    0x3d: "equals (firefox)",
    0x3f: 'ß',
    0x40: "@ (firefox)",
    0x41: 'a',
    0x42: 'b',
    0x43: 'c',
    0x44: 'd',
    0x45: 'e',
    0x46: 'f',
    0x47: 'g',
    0x48: 'h',
    0x49: 'i',
    0x4a: 'j',
    0x4b: 'k',
    0x4c: 'l',
    0x4d: 'm',
    0x4e: 'n',
    0x4f: 'o',
    0x50: 'p',
    0x51: 'q',
    0x52: 'r',
    0x53: 's',
    0x54: 't',
    0x55: 'u',
    0x56: 'v',
    0x57: 'w',
    0x58: 'x',
    0x59: 'y',
    0x5a: 'z',
    0x5b: "Windows Key / Left ⌘ / Chromebook Search key",
    0x5c: "right window key",
    0x5d: "Windows Menu / Right ⌘",
    0x5f: "sleep",
    0x60: "numpad 0",
    0x61: "numpad 1",
    0x62: "numpad 2",
    0x63: "numpad 3",
    0x64: "numpad 4",
    0x65: "numpad 5",
    0x66: "numpad 6",
    0x67: "numpad 7",
    0x68: "numpad 8",
    0x69: "numpad 9",
    0x6a: "multiply",
    0x6b: "add",
    0x6c: "numpad period (firefox)",
    0x6d: "subtract",
    0x6e: "decimal point",
    0x6f: 'divide',
    0x70: 'f1',
    0x71: 'f2',
    0x72: 'f3',
    0x73: 'f4',
    0x74: 'f5',
    0x75: 'f6',
    0x76: 'f7',
    0x77: 'f8',
    0x78: 'f9',
    0x79: 'f10',
    0x7a: "f11",
    0x7b: 'f12',
    0x7c: 'f13',
    0x7d: 'f14',
    0x7e: 'f15',
    0x7f: "f16",
    0x80: 'f17',
    0x81: "f18",
    0x82: "f19",
    0x83: "f20",
    0x84: 'f21',
    0x85: "f22",
    0x86: "f23",
    0x87: "f24",
    0x88: "f25",
    0x89: 'f26',
    0x8a: 'f27',
    0x8b: 'f28',
    0x8c: 'f29',
    0x8d: "f30",
    0x8e: "f31",
    0x8f: "f32",
    0x90: "num lock",
    0x91: "scroll lock",
    0x97: "airplane mode",
    0xa0: '^',
    0xa1: '!',
    0xa2: "؛ (arabic semicolon)",
    0xa3: '#',
    0xa4: '$',
    0xa5: 'ù',
    0xa6: "page backward",
    0xa7: "page forward",
    0xa8: "refresh",
    0xa9: "closing paren (AZERTY)",
    0xaa: '*',
    0xab: "~ + * key",
    0xac: "home key",
    0xad: "minus (firefox), mute/unmute",
    0xae: "decrease volume level",
    0xaf: "increase volume level",
    0xb0: "next",
    0xb1: 'previous',
    0xb2: "stop",
    0xb3: "play/pause",
    0xb4: "e-mail",
    0xb5: "mute/unmute (firefox)",
    0xb6: "decrease volume level (firefox)",
    0xb7: "increase volume level (firefox)",
    0xba: "semi-colon / ñ",
    0xbb: "equal sign",
    0xbc: 'comma',
    0xbd: "dash",
    0xbe: "period",
    0xbf: "forward slash / ç",
    0xc0: "grave accent / ñ / æ / ö",
    0xc1: "?, / or °",
    0xc2: "numpad period (chrome)",
    0xdb: "open bracket",
    0xdc: "back slash",
    0xdd: "close bracket / å",
    0xde: "single quote / ø / ä",
    0xdf: '`',
    0xe0: "left or right ⌘ key (firefox)",
    0xe1: "altgr",
    0xe2: "< /git >, left back slash",
    0xe6: "GNOME Compose Key",
    0xe7: 'ç',
    0xe9: 'XF86Forward',
    0xea: "XF86Back",
    0xeb: "non-conversion",
    0xf0: 'alphanumeric',
    0xf2: 'hiragana/katakana',
    0xf3: "half-width/full-width",
    0xf4: "kanji",
    0xfb: "unlock trackpad (Chrome/Edge)",
    0xff: "toggle touchpad"
  };
  function _0x34a3d3() {
    var _0x320713 = [];
    _0x30f270.find(".mvp-value-table-wrap:not(.mvp-value-table-wrap-disabled)").each(function () {
      _0x320713.push(parseInt(_0x4a3a32(this).find(".mvp-keyboard-keycode").val(), 0xa));
    });
    return _0x320713;
  }
});