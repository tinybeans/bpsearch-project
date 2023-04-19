<?php
require __DIR__ . '/vendor/autoload.php';

use tinybeans\bpsearch\BPSearch;

header('Content-Type: application/json; charset=utf-8');

$config = [
//    // データを格納しているディレクトリのパス
//    'dataDirPath' => '',
//    // キャッシュを保存するディレクトリのパス
//    'cacheDirPath' => '',
//    // マージする検索データのパス
//    'margeItemsJsonPath' => [],
//    // マージするメタデータのパス
//    'margeMetaJsonPath' => [],
//    // limit, offset の初期値を設定
//    'limit'  => 20,
//    'offset' => 0,
//    // limit, offset にかかわらずすべての結果を返す場合は true をセット
//    'return_all' => false,
//    // 先頭のいくつかの item を抜き出して splicedItems に入れる。[$offset, $length] という 2要素を持つ配列で指定する。
//    // URL パラメータで指定する場合は splice_o と splice_l で指定する
//    'splice' => [], // 先頭の1つを抜き出す場合は [0, 1]
//    // フィルター検索を許可するパラメータ（ `search` `rand` `from` `to` `operator` は特殊なパラメータのためフィルターに利用できません）
//    'filters' => [
//        'id' => 'eq',
//        'title' => 'like',
//        'url' => 'like',
//        'keywords' => 'eq',
//        'categoryId' => 'eq',
//        'categoryIds' => 'eq',
//        'categoryLabel' => 'eq',
//        'tagIds' => 'eq',
//        'year' => 'eq',
//        'month' => 'eq',
//        'date' => 'eq',
//        'day' => 'eq',
//        'datetime' => 'eq',
//    ],
//    // 初期値として与えるパラメータ
//    'initParams' => [],
//    // パラメータマッピング
//    'paramMapping' => [
//        'from' => 'datetime',
//        'to' => 'datetime',
//    ],
//    // ソートの基準となるパラメータとソート順を初期値（パラメータに `sortBy` または `sortOrder` がない場合は表示用データの順）
//    'sortBy' => 'datetime',
//    'sortOrder' => 'descend', // 'ascend' or 'descend'
//    // デバッグモードにする場合は true をセット
//    'devMode' => false,
//    // 処理時間を計測する場合は true をセット
//    'returnTime' => false,
//    // 実行ファイルの URL を JSON に含める場合は true をセット
//    'includeScriptUrl' => true,
//    // リファラの URL を JSON に含める場合は true をセット
//    'includeRefererUrl' => true,
//    // ページネーションの情報を結果の JSON に含める場合は true をセット
//    'includePagination' => true,
//    // ページネーションに表示する最大数（奇数をセット）
//    'viewPagesLimit' => 3, // 3, 5, 7, 9 ...
];

//function modifyGetParams($params) {
//    if (isset($params['search']) && $params['search']) {
//        $params['search'] = '無鉄砲 ' . $params['search'];
//    }
//    return $params;
//}

//function beforeResponse($result) {
//    $result['foo'] = true;
//    return $result;
//}

$bpsearch = new BPSearch($config);
//$bpsearch->addCallback('modifyGetParams', 'modifyGetParams');
//$bpsearch->addCallback('beforeResponse', 'beforeResponse');
$bpsearch->run();
