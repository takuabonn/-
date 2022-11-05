# 機種変更料金算出 API

## ステータスコード

下記のコードを返却します。

| ステータスコード | 説明                                             |
| ---------------- | ------------------------------------------------ |
| 200              | リクエスト成功                                   |
| 201              | 登録成功                                         |
| 204              | リクエストに成功したが返却する body が存在しない |
| 400              | 不正なリクエストパラメータを指定している         |
| 401              | API アクセストークンが不正、または権限不正       |
| 404              | 存在しない URL にアクセス                        |
| 429              | リクエスト制限を超えている                       |
| 500              | 不明なエラー                                     |

## 料金算出

```
POST /api/monthly_charge_calculation HTTP/1.1
```

### Request

| パラメータ                     | 内容                                         | 必須  | デフォルト値 | 最大値 |
| ------------------------------ | -------------------------------------------- | ----- | ------------ | ------ |
| identity_verification_document | 本人確認書類                                 | true  | null         |        |
| model_body_price               | 機種本体価格(税抜き)                         | true  |              |        |
| hwo_to_buy                     | 購入方法(一括,分割)                          | true  |              |        |
| number_of_divisions            | 分割回数(12,24,36)                           | false | null         |        |
| rate_plan                      | 料金プラン(メリハリ,ミニフィット)            | true  |              |        |
| constractor_info               | 契約者情報                                   | true  |              |        |
| how_to_monthly_payment         | 毎月の支払い方法(請求書,口座振替,クレジット) | true  |              |        |
| supporting_document            | 補助書類(公共料金領収書, 住民票)             | false | null         |        |
| option_price                   | オプション料金                               | false | null         |        |

```
{
    identity_verification_document: {
        type: 運転免許証,
        meta: {
            birth_day: yyyy-mm-dd,
            current_address: '東京都',
            valid_date: yyyy-mm-dd,
            first_name: テスト,
            last_name: 太郎
        }
    },
    supporting_document: {
        type: 公共料金領収書,
        meta: {
            birth_day: yyyy-mm-dd,
            current_address: '東京都',
            publish_date: yyyy-mm-dd,
            first_name: テスト,
            last_name: 太郎
        }
    },
    model_body_price: 99999,
    hwo_to_buy: {
        type: 分割,
        number_of_divisions: 12
    },
    rate_plan: メリハリ,
    constractor_info: {
        id: xxxxxx,
        birth_day: yyyy-mm-dd,
        current_address: '東京都',
        first_name: テスト,
        last_name: 太郎,
    },
    how_to_monthly_payment: 口座振替,
    option_price: null
}
```

### Response

```
HTTP/1.1 200 OK
{
    monthly_charge: xxxxxx,
    price_breakdown: {
        how_to_buy: {
            type: 分割,
            number_of_divisions: 12,
        }
        rate_plane: メリハリ,
        rate_plaen_price: xxxxx,
        divied_model_body_price: xxxx,
        option: xxxx
    }
}
```
