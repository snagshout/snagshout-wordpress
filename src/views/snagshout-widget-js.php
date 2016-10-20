<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/react/15.3.2/react-dom.min.js"></script>
<script type="text/javascript">
  (function () {
    var CouponButton = React.createClass({
      getInitialState: function() {
        return {
          active: false,
          copied: false,
        };
      },

      render: function () {
        if (this.state.copied) {
          return React.createElement(
            'button',
            { type: 'button', className: 'ss-expand', disabled: true },
            String.fromCharCode(9986),
            ' Copied!'
          );
        } else if (this.state.active) {
          return React.createElement(
            'button',
            { type: 'button', className: 'ss-expand', disabled: true },
            this.props.promoCode
          );
        }

        return React.createElement(
          'button',
          {
            type: 'button',
            className: 'ss-expand',
            onClick: this.handleButtonClick,
          },
          'Get My Code'
        );
      },

      handleButtonClick: function () {
        this.setState({ copied: true });

        setTimeout(function () {
          this.setState({ copied: false, active: true });
        }.bind(this), 2000);
      },

      propTypes: {
        couponCode: React.PropTypes.string,
      }
    });

    function makeAndMountButton (element) {
      var promoCode = element.attributes.getNamedItem('data-promo-code').value;

      ReactDOM.render(
        React.createElement(CouponButton, { promoCode: promoCode }),
        element
      );
    };

    Array.prototype.forEach.call(
      document.getElementsByClassName('ss-coupon-button'),
      makeAndMountButton
    );
  })();
</script>
