<?php

/**
 * Copyright 2016 Seller Labs LLC
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

?>
<style type="text/css">
  @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }

  [class*='ss-grid'],
  [class*='ss-col-'],
  .ss-grid:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  [class*='ss-col-'] {
    width: 100%;
    float: left;
    min-height: 1px;
    padding-left: 5px;
    padding-right: 5px; /* column-space */
  }

  [class*='ss-col-'] [class*='ss-col-']:last-child {
    padding-right: 0;
  }

  .ss-grid {
    margin: 0 auto;
    overflow: hidden;
    margin-left: -5px;
    margin-right: -5px;
  }

  .ss-grid:after {
    content: "";
    display: table;
    clear: both;
  }

  .ss-masonry {
    display: -ms-flexbox;
    -ms-flex-direction: column;
    -ms-flex-wrap: wrap;
    display: flex;
    flex-direction: column;
    flex-flow: wrap;
    height: 100%;
  }

  @media only screen and (min-width: 480px) {
    .ss-col-8 {
      width: 66.66%;
    }

    .ss-col-6 {
      width: 50%;
    }

    .ss-col-4 {
      width: 33.33%;
    }

    .ss-col-3 {
      width: 25%;
    }
  }

  .ss-expand {
    width: 100%;
  }

  .ss-campaign {
    margin-bottom: 10px;
    text-align: center;
    display: flex;
    flex-direction: column;
  }

  .ss-campaign a {
    box-shadow: none;
    border: 0;
  }

  .ss-campaign .ss-campaign-card {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    border: 1px solid #ddd;
    padding: 5px;
    font-size: 0.8em;
  }

  .ss-campaign .ss-campaign-card .ss-campaign-image {
    flex-grow: 1;
    display: flex;
  }

  .ss-campaign .ss-campaign-card .ss-campaign-image img {
    margin-bottom: 10px;
    align-self: center;
  }

  .ss-campaign .ss-campaign-card .ss-campaign-title {
    flex-grow: 1;
    display: flex;
  }

  .ss-campaign .ss-campaign-card .ss-campaign-title a {
    align-self: center;
  }

  .ss-campaign .ss-campaign-card ul {
    list-style-type: none;
    margin: auto;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
  }

  .ss-campaign .ss-campaign-card ul li {
    margin-right: 5px;
  }

  .ss-campaign .ss-campaign-card ul li:last-of-type {
    margin-right: 0;
  }

  .ss-prime {
    color: rgba(236, 137, 10, 1);
  }

  .ss-promocode {
    font-family: monospace;
    background-color: #eee;
    padding: 5px;
    border: 1px dashed #aaa;
    color: #333;
  }

  .ss-fade-in {
    animation: fadeIn ease-in 1;
    animation-fill-mode: forwards;
    animation-duration: 0.25s;
  }

  .ss-secondary {
    background-color: #777;
  }

  .ss-mar-5-top {
    margin-top: 5px;
  }

  .ss-amazon-button {
    font-weight: normal;
  }
</style>
