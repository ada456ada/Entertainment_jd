// pages/me/me.js
Page({

  /**
   * 页面的初始数据
   */
  data: {
    user_info: {},
    login: false
  },

  /**
   * 生命周期函数--监听页面加载
   */
  onGotUserInfo(res) {
    let that = this, user_information = res.detail.rawData;
    that.setData({
      user_info: JSON.parse(user_information),
      login: true
    });
    wx.showToast({
      title: '登陆成功',
      icon: 'success',
      duration: 1000
    });
    wx.setStorage({
      key: 'user_info',
      data: user_information
    })
  },

  onLoad: function (options) {
    const that = this;
    wx.getSetting({
      success: function (res) {
        if (res.authSetting['scope.userInfo']) {
          wx.getUserInfo({
            success: function (res) {
              that.setData({
                user_info: res.userInfo,
                login: true
              });
            }
          })
        }
      }
    });
    // wx.getStorage({
    //   key: 'user_info',
    //   success: function(res) {
    //     that.setData({
    //       user_info: JSON.parse(res.data),
    //       login: true
    //     });
    //   }
    // })
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