// pages/components/loc_detail_list_cell/loc_detail_list_cell.js
Component({
  /**
   * 组件的属性列表
   */
  properties: {
    item:{
      type:Object
    }
  },

  /**
   * 组件的初始数据
   */
  data: {
    thumb_img:'../../../img/thumb.png',
    thumbclick:false,
    comment_num: ''
  },

  /**
   * 组件的方法列表
   */
  methods: {
    thumb(){
      const that = this; 
      if(!that.data.thumbclick){
        that.setData({
          thumb_img: '../../../img/thumbclick.png',
          thumbclick: true,
          item:{
            author: that.properties.item.author,
            text: that.properties.item.text,
            comment_num: that.properties.item.comment_num*1+1
          }
        });
      }else{
        that.setData({
          thumb_img: '../../../img/thumb.png',
          thumbclick: false,
          item: {
            author: that.properties.item.author,
            text: that.properties.item.text,
            comment_num: that.properties.item.comment_num - 1
          }
        });
      }
    }
  }
})
