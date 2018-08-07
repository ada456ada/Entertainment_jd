const js_package = require('../../../utils/util.js');
const loc_server_url = getApp().globalData.loc_server_url,
  server_url = getApp().globalData.server_url;
Component({
  properties: {
    "type": {
      type: String,
      value: '评论'
    },
    "page_id": {
      type: String
    },
    "user_name": {
      type: String,
      value:''
    }
  },

  data: {
    input_form: '',
    yes: ''
  },

  methods: {
    check_log() {
      // wx.getSetting({
      //   success: function (res) {
      //     if (!res.authSetting['scope.userInfo']) {
      //       //未授权
      //       wx.showModal({
      //         // title: '您尚未登陆',
      //         content: '您尚未登陆',
      //         showCancel: false, //不显示取消按钮
      //         confirmText: '确定',
      //         success() {
      //           setTimeout(() => {
      //             wx.switchTab({
      //               url: '../me/me'
      //             })
      //           }, 500);
      //         }
      //       })
      //     }
      //   }
      // });
      console.log(this.data.user_name=='');
    },
    getInput(e) { //节流防抖
      js_package.debounce(this.inputChange, 800, 10000, e);
    },
    inputChange(e) {
      console.log(this);
      this.setData({
        input_form: e.detail.value
      });
    },
    submit() {
      const that = this;
      wx.request({
        url: `${server_url}php/submit.php`,
        // url: `${loc_server_url}submit.php`,
        header: {
          "Content-Type": "application/x-www-form-urlencoded"
        },
        method: 'POST',
        data: {
          input_form: that.data.input_form,
          page_id: that.data.page_id,
          user_name: that.data.user_name
        },
        success(res) {
          that.setData({
            yes: '' //textarea清空
          });
        }
      });
      this.triggerEvent('fresh');
    }
  }
})