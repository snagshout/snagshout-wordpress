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

  .ss-campaign .ss-campaign-card {
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    border: 1px solid #ddd;
    padding: 5px;
  }

  .ss-campaign .ss-campaign-card .ss-campaign-image {
    flex-grow: 1;
    display: flex;
  }

  .ss-campaign .ss-campaign-card .ss-campaign-image img {
    margin-bottom: 10px;
    align-self: center;
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
</style>
