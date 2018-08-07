const loc_server_url = getApp().globalData.loc_server_url,
  server_url = getApp().globalData.server_url;
let x = 0;
Page({
  data: {
    userInfo: {},
    concern_box: {
      text: '关注此问题',
      clicked: false,
      color: 'red'
    },
    item: [],
    loc_detail_cell: [],
    page_id: 'suggest'
  },
  fresh(e) {
    const that = this,
      promise = new Promise(() => {
        that.request();
        if (x) {
          wx.showToast({
            title: '评论成功',
            icon: 'success'
          })
        }
      });
      this.onPullDownRefresh();
  },
  request() {
    const that = this;
    wx.request({
      url: `${server_url}php/loc_list_cell.php`,
      method: 'POST',
      header: { "Content-Type": "application/x-www-form-urlencoded" },
      data: {
        parent_id: that.data.page_id
      },
      success(res) {
        that.setData({
          loc_detail_cell: res.data
        });
        x = 1;
      }
    });
  },

  onLoad: function (options) {
    if (!options) {
      return;
    }//神奇的二次调用onLoad，敷衍的解决办法
    const that = this;
    wx.getSetting({
      success: function (res) {
        if (res.authSetting['scope.userInfo']) {
          // 已经授权，可以直接调用 getUserInfo 获取头像昵称
          wx.getUserInfo({
            success: function (res) {
              that.setData({
                userInfo: res.userInfo
              });
            }
          })
        }
      }
    });

    that.setData({
      page_id: JSON.parse(options.item).id
    });

    that.request();

    this.setData({
      item: JSON.parse(options.item)
    });
    wx.showToast({
      title: '数据加载中',
      icon: 'loading',
      duration: 1000
    });
  },
  concern: function () {
    const that = this;
    if (!that.data.concern_box.clicked) {
      that.setData({
        concern_box: {
          text: '已关注',
          clicked: true,
          color: ''
        }
      });
    } else {
      that.setData({
        concern_box: {
          text: '关注此问题',
          clicked: false,
          color: 'red'
        }
      });
    }
  },
  onReady: function () {

  },
  onShow: function () {
    this.onLoad();
  },
  onHide: function () {

  },
  onUnload: function () {

  },
  onPullDownRefresh: function () {
    this.request();
  },
  onReachBottom: function () {

  },
  onShareAppMessage: function () {

  }
})