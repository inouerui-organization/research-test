# テスト調査用アプリ

## 環境のセットアップ

**macの方はターミナル、winの方はwslで行ってください**  
**※wslのセットアップが済んでいるならば、powershell上で`wsl`と入力すると起動します（起動できない場合は、wslのセットアップから行ってください）**

1. このリポジトリをcloneしてください（説明のためにリポジトリ名は`your-project`という名前とします）
2. cdコマンドで、プロジェクトに移動
  ```sh
  cd your-project
  ```
3. `.env`ファイルをコピーして作成
  ```sh
  cp .env.example .env
  ```
4. 依存関係をインストールします
  ```sh
  ./vendor/bin/sail composer install
  ```
5. sailを起動します
  ```sh
  ./vendor/bin/sail up -d
  ```
6. アプリケーションのセットアップをします
  ```sh
  ./vendor/bin/sail artisan key:generate
  ./vendor/bin/sail artisan migrate
  ./vendor/bin/sail artisan db:seed
  ```
7. おまけですが、vscodeで開くやり方です
  ```sh
  code .
  ```

※環境の停止コマンド
```sh
./vendor/bin/sail down
```

## 注意点

- 基本的にphp系のコマンドの先頭に`./vendor/bin/sail`を付けるようになります
  - 例
    - `./vendor/bin/sail artisan make:model Sample`

## 調査内容
以下のテストを実装する

### 1 SampleController#index

- indexメソッドの正常系テスト
  - 他のメソッドを呼び出しているので、モック化が必要かも
  - メソッドを呼び出した際に正しい戻り値かどうかの検証

### 2 SampleService#getAUser

- getAUserメソッドの正常系テスト
  - 他のメソッドを呼び出しているので、モック化が必要かも
  - Userが返ってくるかの検証
- getAUserメソッドの異常系テスト
  - 他のメソッドを呼び出しているので、モック化が必要かも
  - 例外がスローされるかのテスト

### 3 SampleService#getDate

- getDateメソッドの正常系テスト
  - メソッドを呼び出した際に正しい戻り値かどうかの検証
- getDateメソッドの異常系テスト
  - メソッドを呼び出した際に不適切な値（存在しない日付とか）を渡してエラーになるかどうかの検証
