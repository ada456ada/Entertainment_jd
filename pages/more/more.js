const loc_server_url = getApp().globalData.loc_server_url,
  server_url = getApp().globalData.server_url;
Page({
  data: {
    more_list: [],
    position: [1, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    nothing: true
  },

  onLoad: function(options) {
    wx.showLoading({
      title: '数据加载中'
    });
    const that = this;
    wx.request({
      url: `${server_url}php/loc_more.php`,
      // url: `${loc_server_url}loc_more.php`,
      method: 'GET',
      data: {
        classify: 'all'
      },
      success(res) {
        const result = res.data;
        if (result.length == 0) {
          that.setData({
            nothing: false
          });
        }
        for (let i = 0; i < result.length; ++i) {
          result[i].json = JSON.stringify(result[i]);
        }
        that.setData({
          more_list: result
        });
        wx.hideLoading();
      }
    });

  },

  ok() {
    wx.navigateTo({
      url: '../edit_post/edit_post',
    })
  },
  // 点击分类
  titleClick(e) {
    wx.showLoading({
      title: '加载中'
    });
    let that = this;
    wx.request({
      url: `${server_url}php/loc_more.php`,
      method: 'GET',
      data: {
        classify: e.target.dataset.value
      },
      success(res) {
        const result = res.data;
        if (result.length == 0) {
          that.setData({
            nothing: false
          });
        } else {
          that.setData({
            nothing: true
          });
        }
        for (let i = 0; i < result.length; ++i) {
          result[i].json = JSON.stringify(result[i]);
        }
        that.setData({
          more_list: result
        });
        wx.hideLoading();
      }
    });
    const temp = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    temp[e.target.id * 1] = 1;
    this.setData({
      position: temp
    });
  },

  onReady: function() {

  },

  onShow: function() {

  },

  onHide: function() {

  },

  onUnload: function() {

  },

  onPullDownRefresh: function() {

  },

  onReachBottom: function() {

  },

  onShareAppMessage: function() {

  }
})