#!/usr/bin/python3
# - * - coding : utf -8 - * -
# @Author Dongxiaohao
# @time 2022/3/30 13:57

import requests
import datetime
import json


def getElectric(room):
    url2 = 'http://qq.dongxiaohao.top/api/electricity.php?room=' + str(room)
    dianfei = requests.get(url2)  # get请求接口
    return dianfei


def senQQ(qq, msg):
    json_str = json.dumps(msg.json())  # dianfei.json是获取json内容,
    data2 = json.loads(json_str)
    today = datetime.date.today()
    data = {
        "user_id": qq,  # 需要接收消息的QQ号码
        "message": '您的宿舍：' + data2['description'] + '\n' + '截止至：' + str(today) + '\n' + '电量剩余：' + data2[
            'quantity'] + '度'  # 需要发送的消息
    }
    url = 'http://qq.dongxiaohao.top/send_msg'
    requests.post(url, data=data)


if __name__ == '__main__':
    qq = '29633886'               #此处填写你的QQ
    room = 6108                     #此处填写你的宿舍号
    senQQ(qq, getElectric(room))
