const server_url = getApp().globalData.server_url,
  loc_server_url = getApp().globalData.loc_server_url;
Page({
  data: {
    index_list: [],
    user_loc: '',
    inputShowed: false,
    inputVal: "",
    movies: [
      `${server_url}img/logo.png`,
      `${server_url}img/618_red_june.png`
    ]
  },
  onLoad: function (options) {

    // wx.showLoading({
    //   title: '数据加载中'
    // });
    // const that = this;
    // wx.request({
    //   // url: `${loc_server_url}loc_more.php`,
    //   url: `${server_url}php/loc_more.php`,
    //   method: 'GET',
    //   data: {
    //     classify: 'suggest'
    //   },
    //   success(res) {
    //     const item = res.data;
    //     for (let i = 0; i < item.length; ++i) {
    //       item[i].json = JSON.stringify(item[i]);
    //     }
    //     that.setData({
    //       index_list: item
    //     });
    //     wx.hideLoading();
    //   }
    // });
    this.onPullDownRefresh();
  },

  onReady: function () {

  },

  onShow: function () {
    this.onPullDownRefresh();
  },

  onHide: function () {

  },

  onUnload: function () {

  },

  onPullDownRefresh: function () {
    wx.showNavigationBarLoading() //在标题栏中显示加载
    const that = this;
    wx.request({
      // url: `${loc_server_url}loc_more.php`,
      url: `${server_url}php/loc_more.php`,
      method: 'GET',
      data: {
        classify: 'suggest'
      },
      success(res) {
        const item = res.data;
        for (let i = 0; i < item.length; ++i) {
          item[i].json = JSON.stringify(item[i]);
        }
        that.setData({
          index_list: item
        });
        wx.hideLoading();
      }
    });
    wx.hideNavigationBarLoading(); //完成停止加载
    wx.stopPullDownRefresh();
  },

  onReachBottom: function () {

  },

  onShareAppMessage: function () {

  }
})