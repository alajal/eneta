<?php
/** * Copyright 2013 Microsoft Corporation
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

include_once 'taskmodel.php';
$news_user = "unknown";
$news_title = $_POST['input-news-title'];
$news_content = $_POST['input-news-content'];
$news_date = date("Y-m-d H:i:s");
addNews($news_user, $news_title, $news_content, $news_date);
header('Location: ../../index.php');
?>