// pages/detail/detail.js
const loc_server_url = getApp().globalData.loc_server_url,
  server_url = getApp().globalData.server_url;
Page({

  /**
   * 页面的初始数据
   */
  data: {
    stamp_list: [],
    item: {},
    background: '',
    movies: []
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onLoad: function (options) {
    wx.showLoading({
      title:'数据加载中'
    });
    const that = this;
    let promise = new Promise((resolve, reject) => {
      wx.request({
        url: `${server_url}php/query_commodities_detail.php`,
        method: 'GET',
        data: {
          title: JSON.parse(options.item).title
        },
        success(res) {
          that.setData({
            stamp_list: JSON.parse(res.data.list_info),
            background: res.data.background,
            movies: res.data.img_pic
          });
          wx.hideLoading();
        }
      });
    });
    this.setData({
      item: JSON.parse(options.item)//获取传入的该商品json,解析成对象
    });
  },

  /**
   * 生命周期函数--监听页面初次渲染完成
   */
  onReady: function () {

  },

  /**
   * 生命周期函数--监听页面显示
   */
  onShow: function () {

  },

  /**
   * 生命周期函数--监听页面隐藏
   */
  onHide: function () {

  },

  /**
   * 生命周期函数--监听页面卸载
   */
  onUnload: function () {

  },

  /**
   * 页面相关事件处理函数--监听用户下拉动作
   */
  onPullDownRefresh: function () {

  },

  /**
   * 页面上拉触底事件的处理函数
   */
  onReachBottom: function () {

  },

  /**
   * 用户点击右上角分享
   */
  onShareAppMessage: function () {

  }
})