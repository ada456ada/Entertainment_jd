const server_url = getApp().globalData.server_url,
  loc_server_url = getApp().globalData.loc_server_url;
Page({
  data: {
    list_arr: [],
    inputShowed: false,
    inputVal: ''
  },

  onLoad: function (options) {
    wx.showLoading({
      title: '数据加载中'
    });
    let that = this;
    wx.request({
      url: `${server_url}php/rank.php`,
      success(res) {
        const list_arr = res.data;
        for (let i = 0; i < list_arr.length; ++i) {
          if (list_arr[i].img_pic.length > 1) {
            list_arr[i].img_pic = list_arr[i].img_pic[0];
          }
          list_arr[i].json = JSON.stringify(list_arr[i]);
        }
        that.setData({
          list_arr: list_arr,
        });
        wx.hideLoading();
      }
    });

  }
})